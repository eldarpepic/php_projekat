<?php include('inc/header.php'); 
    // user_restrictions();
    if(isset($_SESSION['email']) && isset($_SESSION['id'])) 
    { ?>

<!-- STRANICA ZA ADMINA -->
<?php if($_SESSION['nalog'] == 'admin') {?>

<div class="bt">

    <div class="container">
        <div class="row">


            <h1 class="text-center textColorProfile"><i class="fa-solid fa-gear"></i> Administrator</h1>
            <div style="width:100%;" class="container">
                <div class="row">
                    <div style="padding:0;" class="col-6">
                        <ul class="breadcrumbs1">
                            <li>
                                <a class="parentKnt" href="index.php">Naslovna</a>
                            </li>
                            <i class="fas fa-angle-right iconc"></i>
                            <li>
                                <a class="activeKnt">Korisnici</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- <div class="bt"></div> -->
            <h2 class="textColorProfile"><i class="fa-solid fa-user"></i>
                <?php  $user = get_user(); echo $user['firstname'] . ' ' . $user['lastname'] ?>
            </h2>
            <div class="col-6">
                <div class="dodajKorisnikFlex">
                    <a class="btnKorisnik" href="dodajPacijenta.php">Dodaj korisnika <i
                            class="fa-solid fa-plus"></i></a>
                </div>
            </div>

            <div class="col-6">
                <!-- <div class="heightProfile"> -->

                <!-- <?php 
            $user = get_user(); 
            
            echo "<img class='profile-image' src='" .  $user['image'] ."'>";
           
        ?> -->
                <div class="disline">
                    <h2 class="textColorProfile"><i class="fa-solid fa-hospital-user"></i> Pacijenti</h2>
                </div>
                <table id="customers">
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    <tr>
                        <?php
               display_pacijenti();
            ?>
                    </tr>

                </table>


                <!-- </div> -->
            </div>


            <h2 style="color:transparent;">Interna Medicina</h2>

            <!-- <hr /> -->

            <div class="disline">
                <h2 class="textColorProfile"><i class="fa-solid fa-user-doctor"></i> Lekari</h2>
            </div>
            <div class="bodyLekari">
                <section class="sectionLekari">
                    <div class="swiper mySwiper container-fluid">
                        <div class="swiper-wrapper content">
                            <?php display_lekari_table(); ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </section>
            </div>


        </div>

    </div>

    <!-- dodavanje rasporeda -->
    <h2 class="textColorProfile" style="text-align:center;"><i class="fa-solid fa-calendar"></i> Dodajte termin za
        lekara <button id="dugme" class="btnRaspored">Dodaj termin <i class="fa-solid fa-plus"></i></button>
    </h2>



    <div class="probadiv hiddenRaspored container">
        <div class="row">
            <div class="col-6">
                <form method="POST">

                    <h3 class="iconRaspored"><i class="fa-solid fa-calendar"></i></h3>
                    <label class="textRaspored" for="datum">Datum</label>
                    <?php date_default_timezone_set("Europe/Belgrade"); ?>
                    <input id="datum" type="date" required name="datum" min="<?php echo date("Y-m-d"); ?>">
                    <label class="textRaspored" for="lekari">Lekar</label>
                    <div class="custom-select" style="width:100%;">
                        <select name="lekari" required>
                            <option>Izaberite lekara:</option>
                            <?php display_lekari_raspored(); ?>
                        </select>
                    </div>

                    <label class="textRaspored" for="appt">Vreme</label><br />
                    <input style="width:100%; margin-top: 8px;" type="time" id="appt" name="vreme"
                        min="<?php echo date("G:i"); ?>" max="20:00" required>

                    <!-- 
                        <div class="flexBtnRaspored">
                            <a href="dodajraspored.php"><button type="submit" class="btnRasporedDodaj">Dodaj <i
                                        class="fa-solid fa-plus"></i></button></a>
                                    </div> -->


                    <input type="submit" name="submit-raspored" value="Dodaj">

                    <?php
                    dodaj_raspored(); ?>
                </form>
            </div>
        </div>
    </div>

    <h2 class="textColorProfile" style="text-align:center;">Interna Medicina</h2>

</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>

<?php }  else { ?>
header("Location: index.php");
<?php } ?>
<!-- FOOTER -->
<section class="section">
    <div style="width:100%" class="container footerM">
        <!-- Footer -->
        <footer class="page-footer font-small mdb-color pt-4">
            <div class="footerFlex">
                <!-- Footer Links -->
                <div class="container text-center text-md-left">
                    <!-- Footer links -->
                    <div class="row text-center text-md-left mt-3 pb-3">
                        <!-- Grid column -->
                        <div class="col-2 col1-footer">
                            <h2 class="text-uppercase mb-4 font-weight-bold">
                                Radno vreme:
                            </h2>
                            <p>Radnim danima: 7:00-20:00</p>
                            <p>Subotom: 9:00-14:00</p>

                        </div>


                        <div class="col-2 col1-footer">
                            <h2 class="text-uppercase mb-4 font-weight-bold">
                                Linkovi:
                            </h2>
                            <p>
                                <a style="color: #383c43" href="login.php">Prijavi se</a>
                            </p>
                            <p>
                                <a style="color: #383c43" href="kontakt.php">Kontakt</a>
                            </p>
                            <p>
                                <a style="color: #383c43" href="galerija">Galerija</a>
                            </p>
                            <p>
                                <a style="color: #383c43" href="O nama">O nama</a>
                            </p>
                        </div>


                        <div class="col-2 col1-footer">
                            <p>
                                <i class="fas fa-home mr-3"></i> Tutin, Revolucije bb

                            </p>
                            <p>
                                <i class="fas fa-envelope mr-3"></i>
                                eldar.pepic@live.de
                            </p>
                            <p>
                                <i class="fas fa-phone mr-3"></i> + 381 64 0600 600
                            </p>
                            <p>
                                <i class="fas fa-print mr-3"></i> + 381 64 0600 600
                            </p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Footer links -->
                </div>
            </div>
        </footer>
        <!-- Footer -->
    </div>
</section>

<!-- FOOTER -->
<div style="width:100%" class="container copyright">
    <div class="row">
        <div class="row d-flex align-items-center">
            <!-- Grid column -->
            <div class="col-3 text-centerft col-lg-8">
                <!--Copyright-->
                <p>
                    © 2022 Copyright:
                    <a href="https://mdbootstrap.com/">
                        <strong> eldar.pepic@live.de</strong>
                    </a>
                </p>
            </div>
            <div class="col-3 text-centerft col-lg-4 ml-lg-0">
                <!-- Social buttons -->
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Grid column -->
        </div>
    </div>
</div>
<script>
<?php require_once("js/script.js");?>
</script>
</body>

</html>

<?php } else {
    header("Location: index.php");
} ?>