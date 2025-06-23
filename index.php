<?php

    include "connection.php";
    include "index_navbar.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital library</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="banner">
        <div class="banner-content">
            <h1>Digital Library</h1>
        </div>
    </div>
    <div class="trending-books all-books">
        <div class="small-container">
            <h2 class="co-title">Trending Books</h2>
            <div class="row">
            <?php
                $res=mysqli_query($db,"SELECT books.bookid,books.bookpic,books.bookname,category.categoryname,authors.authorname,books.ISBN,books.price,quantity,status from  `books` join `category` on category.categoryid=books.categoryid join `authors` on authors.authorid=books.authorid join trendingbook on trendingbook.bookid=books.bookid;");
                while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <div class="card">
                        <!-- <img src="images/c.jpg" alt="">  -->
                        <?php
                            echo "<img src='images/".$row['bookpic']."'>";
                        ?>
                        <div class="card-body">
                            <h4 style="font-size: 18px;">
                                <?php
                                    echo $row['bookname'];
                                ?></h4>
                                <p style="font-size: 18px">Price: 
                                <?php
                                    echo $row['price'];
                                ?> Tk.</p>
                            
                            <div class="overlay"></div>
                            <div class="sub-card">
                            <p><b>Book Name: &nbsp;</b> 
                            <?php
                                echo $row['bookname'];
                            ?></p>  
                            <p><b>Category Name: &nbsp;</b> 
                            <?php
                                echo $row['categoryname'];
                            ?></p>
                            <p><b>Author Name: &nbsp;</b> 
                            <?php
                                echo $row['authorname'];
                            ?></p>
                            <p><b>ISBN: &nbsp;</b> 
                            <?php
                                echo $row['ISBN'];
                            ?></p>
                            <p><b>Quantity: &nbsp;</b> 
                            <?php
                                echo $row['quantity'];
                            ?></p>
                            <p><b>Price:</b> 
                            <?php
                                echo $row['price'];
                            ?> Tk.</p> 
                            <p><b>Status: &nbsp;</b>
                            <span>
                            <?php
                                echo $row['status'];
                            ?></span> </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <!-- <div class="card">
                    <img src="images/c.jpg" alt=""> 
                    <div class="card-body">
                        <h4>C</h4>
                        <p>$50.00</p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/cplus.jpg" alt="">
                    <div class="card-body">
                        <h4>C++</h4>
                        <p>$50.00</p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/java.jpg" alt="" class="java-img">
                    <div class="card-body">
                        <h4>Java</h4>
                        <p>$50.00</p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/python2.jpg" alt="">
                    <div class="card-body">
                        <h4>Python</h4>
                        <p>$50.00</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="testimonial">
        <div class="small-container">
        <h2 class="co-title">Testimonial</h2>
            <div class="row">
            <?php
            $res=mysqli_query($db,"SELECT student.studentpic,FullName,feedback.rating,comment from feedback join student on student.studentid=feedback.stdid ORDER BY feedback.rating DESC");
            $total = mysqli_num_rows($res);
            $count=0;
            while($count<3 && $row=mysqli_fetch_assoc($res)){
                ?>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p><?php
                        echo $row['comment'];
                    ?></p>
                    <?php
                        ?>
                        <div class="rating"><?php
                        if($row['rating']==5){
                            ?>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <?php
                        }
                        else if($row['rating']==4){
                            ?>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <?php
                        }
                        else if($row['rating']==3){
                            ?>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <?php
                        }
                        else if($row['rating']==2){
                            ?>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <?php
                        }
                        else if($row['rating']==1){
                            ?>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <?php
                        }?>
                        </div>
                    <?php
                        echo "<img src='images/".$row['studentpic']."'>";
                    ?>
                    <?php
                        echo "<h3>";echo $row['FullName'];echo"</h3>";
                    ?>
                </div>
                <?php
                $count = $count+1;
            }
            ?>
                
                <!-- <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>
                        Lorem Ipsim is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has been the industry's standard
                        dummy text ever.
                     </p>
                     <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/user-1.png" alt="">
                    <h3>Sean Parker</h3>
                </div> -->
                <!-- <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>
                        Lorem Ipsim is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has been the industry's standard
                        dummy text ever.
                     </p>
                     <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/user-2.png" alt="">
                    <h3>Mike Smith</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>
                        Lorem Ipsim is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has been the industry's standard
                        dummy text ever.
                     </p>
                     <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <img src="images/user-3.png" alt="">
                    <h3>Mabel Joe</h3>
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-row">
            <div class="footer-left">
                <h1>Opening Hours</h1>
                <p><i class="far fa-clock"></i>Monday to Friday - 9am to 9pm</p>
                <p><i class="far fa-clock"></i>Saturday to Sunday - 8am to 11pm</p>
            </div>
            <div class="footer-middle">
                <iframe class="map" src="data:image/jpeg;base64,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" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy" aria-hidden="false"></iframe>
            </div>
            <div class="footer-right">
                <h1>Get In Touch</h1>
                <p> UNA, HIMACHAL PARDESH<i class="fas fa-map-marker-alt"></i></p>
                <p>ishikathakur@gmail.com<i class="fas fa-paper-plane"></i></p>
                <p>+91 9219436XXX<i class="fas fa-phone-alt"></i></p>
            </div>
        </div>
        <div class="social-links">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram-square"></i>
            <i class="fab fa-youtube"></i>
            <p>&copy; 2021 Copyright by Our Team</p>
        </div>
    </div>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>