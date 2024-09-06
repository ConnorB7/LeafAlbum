<!DOCTYPE html>
<html>

   <head>
   <!--
     
      dessertWeb Sample Recipe
      Author: Connor Bobsien
      Date:   June 27th 2023

      Filename:         torte.htm
      Supporting files: back.png, chef.png, comments.js, dw.css,
                        dwlogo.png, halfstar.png, modernizr-1.5.js,
                        star.png, torte.jpg
                        
   -->

      <meta charset="UTF-8" />
      <title>Apple Bavarian Torte</title>
      <script src="main.js"></script>
      
      <link href="main.css" rel="stylesheet" />

   </head>

	<body>
<!-- Sidebar -->
<div class="sidebar bar-block border-right" style="display:none" id="mySidebar">
							<button onclick="w3_close()" class="bar-item button">Close &times;</button>
							<a href="#" class="bar-item button">Posts</a>
							<a href="#" class="bar-item button">Friends</a>
							<a href="#" class="bar-item button">Profile</a>
							<a href="#" class="bar-item button">Logout</a>
						</div>	
			<div id="navbar">
			
				<div class="navButton">
					<button class="button teal xlarge" onclick="w3_open()">☰</button>
				</div>			
				<nav class="horizontal">
					<ul>
						<li><a href="#">Logout</a></li>
						<li><a href="#">Profile</a></li>
						<li><a href="#">Friends</a></li>
						<li><a href="#">Posts</a></li>
					</ul>
				</nav>
				<nav class="horizontalimg">
					<a class="img">	<img src="leaf.png"></a>
				</nav>
				</div>
		<br><br><br>

<!-- Page Content -->
		<section id="page">
		<div class="main-container">
		<div class="fixer-container">
         <article>
               <h2>by Lemking</h2>

            <p>A classic European torte baked in a springform pan. Cream cheese, 
               sliced almonds, and apples make this the perfect holiday treat 
               (12 servings).
            </p>

            <h2>Ingredients</h2>	
            <ul>
               <li>1/2 cup butter</li>
               <li>1/3 cup white sugar</li> 
               <li>1/4 teaspoon vanilla extract</li>
               <li>1 cup all-purpose flour</li> 
               <li>1 (8 ounce) package cream cheese</li>
               <li>1/4 cup white sugar</li>
               <li>1 egg</li>
               <li>1/2 teaspoon vanilla extract</li>
               <li>6 apples - peeled, cored, and sliced</li> 
               <li>1/3 cup white sugar</li> 
               <li>1/2 teaspoon ground cinnamon</li>
               <li>1/4 cup sliced almonds</li>
            </ul>

            <h2>Directions</h2>
            <ol>
               <li>Preheat oven to 450&deg; F (230&deg; C).</li>
               <li>Cream together butter, sugar, vanilla, and flour.</li>
               <li>Press crust mixture into the flat bottom of a 9-inch springform pan. 
                   Set aside.</li>
               <li>In a medium bowl, blend cream cheese and sugar. Beat in egg and vanilla.
                   Pour cheese mixture over crust.</li>
               <li>Toss apples with sugar and cinnamon. Spread apple 
                   mixture over cheese mixture.</li>
               <li>Bake for 10 minutes. Reduce heat to 400&deg; F (200&deg; C) and continue 
                   baking for 25 minutes.</li>
               <li>Sprinkle almonds over top of torte. Continue baking until lightly browned.
                   Cool before removing from pan.</li>
            </ol>

         </article>
		 </div>
		 </div>




         <footer>		
			<div class="main-container">
				<div class="fixer-container">
				<nav class="footer">
					<ul>
						<li><a href="#">Contact</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</nav>
				</div>
			</div>
         </footer>

      </section>
   </body>
</html>