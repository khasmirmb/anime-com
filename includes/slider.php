<div class="section">
    <div class="section-selector">
            <div class="slider">
                <div class="slide">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="st first">
                            <img src="../images/img1.jpg" alt="img" width="1366" height="768">
                    </div>

                    <div class="st">
                        <img src="../images/img2.jpg" alt="img" width="1366" height="768">
                    </div>

                    <div class="st">
                        <img src="../images/img3.jpg" alt="img" width="1366" height="768">
                    </div>

                    <div class="st">
                        <img src="../images/img4.jpg" alt="img" width="1366" height="768">
                    </div>

                    <div class="nav-auto">
                        <div class="a-b1"></div>
                        <div class="a-b2"></div>
                        <div class="a-b3"></div>
                        <div class="a-b4"></div>
                    </div>
                </div>
                <div class="nav-m">
                    <label for="radio1" class="m-btn"></label>
                    <label for="radio2" class="m-btn"></label>
                    <label for="radio3" class="m-btn"></label>
                    <label for="radio4" class="m-btn"></label>
                </div>
            </div>
        </div>
</div>
    <script type="text/javascript">
            var counter=1;
            setInterval(function(){
                document.getElementById('radio' + counter).checked=true;
                counter++;
                if(counter > 4){
                    counter = 1;
                }
            },5000);
    </script>