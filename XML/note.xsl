<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
	<html>
	<body>
		<h1> My Note </h1>
		<table>
			<tr>
				<th> To </th>
				<th> From </th>
				<th> Heading </th>
				<th> Body </th>
			</tr>
			
		<xsl:for-each select="note">
		<tr>
			<td><xsl:value-of select ="to"/></td>
			<td><xsl:value-of select="from"/></td>
			<td><xsl:value-of select="heading"/></td>
			<td><xsl:value-of select="body"/></td>
		</tr>
		</xsl:for-each>
		</table>
	</body>
	</html>

</xsl:template>
</xsl:stylesheet>