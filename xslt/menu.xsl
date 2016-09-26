<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE xsl:stylesheet [
	<!ENTITY nbsp "&#160;">
]>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output encoding="utf-8" indent="yes" method="html"/>
	<xsl:param name="politic"/>
	<xsl:param name="language_id"/>
	<xsl:param name="default"/>
	<xsl:param name="suffix"/>
	<xsl:param name="tournaments"/>
	<xsl:param name="roles"/>
	<xsl:param name="type"/>
	<xsl:template match="/menu">
		<xsl:choose>
			<xsl:when test="$type = 'main'"><xsl:call-template name="main"/></xsl:when>
		</xsl:choose>
	</xsl:template>
<!--
//
//
//
-->
	<xsl:template name="main">
		<!-- xsl:value-of select="$roles"/ -->
		<xsl:variable name="lang"><xsl:if test="$politic = 'suffix' and $default = 'false'">/<xsl:value-of select="$suffix"/></xsl:if></xsl:variable>
		<xsl:call-template name="drawLevel">
			<xsl:with-param name="level" select="number(0)"/>
			<xsl:with-param name="items" select="node/node[count(menu[@name='main_menu']) != 0]"/>
			<xsl:with-param name="pattern" select="$lang"/>
		</xsl:call-template>
	</xsl:template>
<!--
//
//
//
-->
<xsl:template name="drawLevel">
	<xsl:param name="level"/>
	<xsl:param name="items"/>
	<xsl:param name="pattern"/>
	<xsl:if test="count($items) != 0">
		<xsl:variable name="padding" select="$level * 20"/>
		<ul class="list-unstyled" style="padding-left: {$padding}px;">
			<xsl:for-each select="$items">
				<xsl:if test="string-length(condition) = 0 or contains($tournaments, concat('|',condition,'|'))">
					<xsl:variable name="role"><xsl:call-template name="checkRoles"/></xsl:variable>
					<xsl:if test="count(role) = 0 or $role = 'true'">
						<li>
							<xsl:choose>
								<xsl:when test="@self = 1 and count(descendant::node[@self = 1]) = 0">
									<xsl:call-template name="getTitle"/>
								</xsl:when>
								<xsl:otherwise>
									<a href="{$pattern}/{@pattern}/"><xsl:call-template name="getTitle"/></a>
								</xsl:otherwise>
							</xsl:choose>
							<xsl:call-template name="drawLevel">
								<xsl:with-param name="level" select="$level + 1"/>
								<xsl:with-param name="items" select="node"/>
								<xsl:with-param name="pattern" select="concat($pattern,'/', @pattern)"/>
							</xsl:call-template>
						</li>
					</xsl:if>
				</xsl:if>
			</xsl:for-each>
		</ul>
	</xsl:if>
</xsl:template>
<!--
//
//
//
-->
	<xsl:template name="getTitle">
		<xsl:choose>
			<xsl:when test="string-length(title[@lang = $language_id]/text()) != 0"><xsl:value-of select="title[@lang = $language_id]/text()" disable-output-escaping="yes"/></xsl:when>
			<xsl:when test="string-length(title[@lang = $language_id]/@value) != 0"><xsl:value-of select="title[@lang = $language_id]/@value" disable-output-escaping="yes"/></xsl:when>
			<xsl:otherwise><xsl:value-of select="@title" disable-output-escaping="yes"/></xsl:otherwise>
		</xsl:choose>
	</xsl:template>
<!--
//
//
//
-->
	<xsl:template name="checkRoles">
		<xsl:call-template name="checkRole">
			<xsl:with-param name="items" select="role"/>
			<xsl:with-param name="pos" select="number(1)"/>
		</xsl:call-template>
	</xsl:template>
<!--
//
//
//
-->
	<xsl:template name="checkRole">
		<xsl:param name="items"/>
		<xsl:param name="pos"/>
		<xsl:if test="$pos &lt;= count($items)">
			<xsl:choose>
				<xsl:when test="contains($roles, concat('|',$items[$pos],'|'))">true</xsl:when>
				<xsl:otherwise>
					<xsl:call-template name="checkRole">
						<xsl:with-param name="items" select="$items"/>
						<xsl:with-param name="pos" select="number($pos) + 1"/>
					</xsl:call-template>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:if>
	</xsl:template>
</xsl:stylesheet>
