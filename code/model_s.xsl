<xsl:stylesheet version = "1.0" 
xmlns:xsl = "http://www.w3.org/1999/XSL/Transform"> 

<xsl:template match = "/elements">
	<html>
        <head>
            <title>Model S | Tesla</title>
            <link rel="icon" type="image/png" href="https://cdn.iconscout.com/icon/free/png-512/tesla-11-569489.png" />
            <link rel="stylesheet" href="../style/main.css" />
            <link rel="stylesheet" href="../style/model_s.css" />
        </head>
		<body>
			<!-- NAV -->
            <div class="nav-model-s">
                <a href='./index.html'>
                    <img class="nav-logo" src='../assets/tesla_logo_title.png' />
                </a>

                <div class='nav-group'>
                    <a href='./model_s.xml' class='nav-button'>Model S</a>
                    <a href='' class='nav-button'>Model 3</a>
                    <a href='./model_x.html' class='nav-button'>Model X</a>
                    <a href='' class='nav-button'>Model Y</a>
                    <a href='' class='nav-button'>Solar Roof</a>
                    <a href='' class='nav-button'>Solar Panels</a>
                </div>

                <div class='nav-group'>
                    <a href='' class='nav-button'>Shop</a>
                    <a href='./login.php' class='nav-button'>Tesla Account</a>
                    <img src="https://img.icons8.com/material-two-tone/24/000000/menu--v3.png" class='menu-icon' />
                </div>
            </div>

            <!-- CONTENT -->
            <div class="first-slide-model-s slide">
                <div class="slide-elements">
                    <h1 class="slide-title">Model S</h1>
                    <h4 class="slide-subtitle">Plaid</h4>
                </div>

                <div class="slide-elements-model-s">
                    <div>
                        <!-- STATS -->
                        <div class='stats-box'>
                            <div class="top-stat">
                                <p class='main-text-stat'>390<span class='small-stat'>mi</span></p>
                                <p class='stat-legend'>Range (Est.)</p>
                            </div>
                            <div class="top-stat">
                                <p class='main-text-stat'>1.99<span class='small-stat'>s</span></p>
                                <p class='stat-legend'>0-60 mph</p>
                            </div>
                            <div class="top-stat">
                                <p class='main-text-stat'>200<span class='small-stat'>mph</span></p>
                                <p class='stat-legend'>Top Speed</p>
                            </div>
                            <div class="top-stat">
                                <p class='main-text-stat'>1,020<span class='small-stat'>hp</span></p>
                                <p class='stat-legend'>Peak Power</p>
                            </div>
                            <div class="top-stat">
                                <a href='./design_model_s.html'><button class="order-button">Order now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="second-slide-model-s slide">
                <div class="slide-elements-center">
                    <h1 class="slide-title-model-s">All New Interior</h1>
                </div>
            </div>

            <!-- THIRD SLIDE WITH XML -->
            <div class="third-slide-model-s">
                <table>
                    <xsl:for-each select = "element">
				
					<tr>
						<td>
                            <img border="0" alt="delete" class='table-picture' >
                                <xsl:attribute name="src">
                                <xsl:value-of select="image1" />
                                </xsl:attribute>
                            </img>
                        </td>
						<td>
                            <a target='_blank'>
                                <xsl:attribute name="href">
                                <xsl:value-of select="link1" />
                                </xsl:attribute>
                                <p class='td-title'>
                                    <xsl:value-of select = "title1"/>
                                </p>
                            </a>
                            <p><xsl:value-of select = "text1"/></p>
                        </td>
					</tr>

                    <tr>
						<td>
                            <a target='_blank'>
                                <xsl:attribute name="href">
                                <xsl:value-of select="link2" />
                                </xsl:attribute>
                                <p class='td-title'>
                                    <xsl:value-of select = "title2"/>
                                </p>
                            </a>
                            <p><xsl:value-of select = "text2"/></p>
                        </td>
						<td>
                            <img border="0" alt="delete" class='table-picture' >
                                <xsl:attribute name="src">
                                <xsl:value-of select="image2" />
                                </xsl:attribute>
                            </img>
                        </td>
					</tr>
				
				</xsl:for-each>
                </table>
            </div>

            

		</body>
	</html>
</xsl:template>
</xsl:stylesheet>