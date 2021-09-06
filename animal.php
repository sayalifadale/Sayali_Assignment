<html>
  <head>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>

  	<!---- PHP Code Visitor Counter --->
  	<?php
        try{
        	$con= new PDO ("mysql:host=localhost;dbname=animal","root","");
        }catch(PDOExecution $e){
        	echo $e->getMessage();
        }

         $sql="update vc set visitor_conter=visitor_conter+1";
         $stmt =$con->prepare($sql);
         $stmt->execute();

         $sql="select visitor_conter from vc";
         $stmt =$con->prepare($sql);
         $stmt->execute();
         $arr=$stmt->fetchALL(PDO::FETCH_ASSOC);
         $a= $arr[0] ['visitor_conter'];
        
    ?>
     
  	<!---- End PHP Code Visitor Counter  --->
  	

  	<!---- Code Show Visitor Counter --->
  	<div>
  		<ul id="v_c">
  		  <li>Total Visitor:<?php echo $a ?></li>
  		</ul>
  	</div>
  	<!---- END Code Show Visitor Counter --->

    <!---- Code Show Animal Info --->  
       <div class="row">
            <!---- Code For Sort Table Data --->
            <form action="" method="GET">
                <div class="row">
                    <div class="">
                        <div class="input-group mb-3">
                            <span ><b>Sort By</b> </span>
                            <select name="sort_alphabet" class="form-control" style="width: 15%;">
                                <option value="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z"){ echo "selected"; } ?> > Ascending Order</option>
                                <option value="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a"){ echo "selected"; } ?> >Sort By Date </option>
                            </select>
                            <input type="submit" value="Sort">
                        </div>                            
                    </div>
                </div>
            </form>
            <!---- Code For Sort Table Data --->

            <!---- Code For Filter Table Data --->
            <form action="" method="GET">
                <div class="input-group">
                    <span ><b>Filter By</b> </span>
                    Category:
                    <select name="filter" class="form-control" style="width: 15%;">
                        <option value="herbivores" <?php if(isset($_GET['filter']) && $_GET['filter'] == "herbivores"){ echo "selected"; } ?> >Herbivores</option>
                        <option value="omnivores" <?php if(isset($_GET['filter']) && $_GET['filter'] == "omnivores"){ echo "selected"; } ?> >Omnivores </option>
                        <option value="carnvores" <?php if(isset($_GET['filter']) && $_GET['filter'] == "carnvores"){ echo "selected"; } ?> >carnvores </option>
                    </select>
                    Expectancy:
                    <select name="filter" class="form-control" style="width: 15%;">
                        <option value="0-1" <?php if(isset($_GET['filter']) && $_GET['filter'] == "[0-1]"){ echo "selected"; } ?> >[0-1]</option>
                        <option value="1-5" <?php if(isset($_GET['filter']) && $_GET['filter'] == "[1-5]"){ echo "selected"; } ?> >[1-5] </option>
                        <option value="5-10" <?php if(isset($_GET['filter']) && $_GET['filter'] == "[5-10]"){ echo "selected"; } ?> >[5-10] </option>
                        <option value="10+" <?php if(isset($_GET['filter']) && $_GET['filter'] == "[10+]"){ echo "selected"; } ?> >[10+] </option>
                    </select>
                    <input type="submit" class="" id="" value=" Filter">
                </div>
            </form>
            <!---- END Code For filter Table Data --->
        </div>

        <!---- Code For Display Animal Data Table--->
        <div class="">
            <table class="" id="animal_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Expectancy</th>
                    </tr>
                </thead>
                <tbody>

                	<!---- PHP Code For Sort And Filter And Display Table Data--->
                    <?php
                        $con = mysqli_connect("localhost","root","","animal");
                        
                        /*---- PHP Code For Sort And Filter Table Data---*/

                        $sort_option = "";
                        if(isset($_GET['sort_alphabet']))
                        {
                                if($_GET['sort_alphabet'] == "a-z")
                                    {
                                        $sort_option = "ORDER BY name ASC";
                                    }
                                elseif($_GET['sort_alphabet'] == "z-a")
                                    {
                                        $sort_option = "ORDER BY created_at DESC";
                                    }
                                else{
                                        $sort_option ="name ASC";
                                    }
                        }

                        if(isset($_GET['filter']))
                        {
                            if($_GET['filter'] == "herbivores")
                            {
                                $sort_option = "where category='Herbivores'";
                            }
                            elseif($_GET['filter'] == "omnivores")
                            {
                                $sort_option = "where category='Omnivores'";
                            }
                            elseif($_GET['filter'] == "carnvores")
                            {
                                $sort_option = "where category='Carnvores'";
                            }
                            else
                            {
                                $sort_option ="name ASC";
                            }
                        }
                        if(isset($_GET['filter']))
                        {
                            if($_GET['filter'] == "0-1")
                            {
                                $sort_option = "where expectancy='[0-1 year]'";
                            }
                            elseif($_GET['filter'] == "1-5")
                            {
                                $sort_option = "where expectancy='[1-5 year]'";
                            }
                            elseif($_GET['filter'] == "5-10")
                            {
                                $sort_option = "where expectancy='[5-10 year]'";
                            }
                            elseif($_GET['filter'] == "10+")
                            {
                                $sort_option = "where expectancy='[10+ year]'";
                            }
                            else
                            {
                                $sort_option ="name ASC";
                            }
                        }
                        
                        /*---- End PHP Code For Sort And Filter Table Data---*/

                        /*---- PHP Code Display Table Data in  Table Data---*/

                        $query = "SELECT * FROM animal_info  $sort_option";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                           foreach($query_run as $row)
                           {
                                echo'<tr>';
			                        echo '<td>'.$row['name'].'</td><td>'.$row['category'].'</td><td><img src="image/'.$row['photo'].'" width="100px" height="100px"></td><td>'.$row['description'].'</td><td>'.$row['expectancy'].'</td>';
		                        echo '</tr>';
		                        ?>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="3">No Record Found</td>
                            </tr>
                            <?php
                        }
                    ?>
                    <!---- PHP Code For Sort And Filter And Display Table Data--->
                    </tbody>
                </table>
            </div>
        </div>

        

    </body>
<html>








