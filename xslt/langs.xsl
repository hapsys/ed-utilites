<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE xsl:stylesheet [
	<!ENTITY nbsp "&#160;">
]>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output encoding="utf-8" indent="yes" method="html"/>
	<xsl:param name="politic"/>
	<xsl:template match="/data">
		<xsl:if test="$politic != 'none'">
			<div style="margin:10 10 10 10">
				<xsl:for-each select="itemlist[@name='languages']/item">
					<span style="margin-right:20px">
						<xsl:choose>
							<xsl:when test="field[@name='current']/@value = '1'">
								<xsl:value-of select="field[@name='name']/@value" disable-output-escaping="yes"/>
							</xsl:when>
							<xsl:otherwise>
								<a href="{field[@name='href']/@value}"><xsl:value-of select="field[@name='name']/@value" disable-output-escaping="yes"/></a>
							</xsl:otherwise>
						</xsl:choose>
					</span>
				</xsl:for-each>
			</div>
		</xsl:if>
	</xsl:template>
<!--
//
//
//
-->
</xsl:stylesheet>