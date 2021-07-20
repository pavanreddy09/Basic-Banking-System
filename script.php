<script type="text/javascript">
    const menu = document.querySelector(".hamburger-menu");
      const ultag = document.querySelector("nav ul");

      menu.addEventListener("click", function() {
        console.log("clicked");
      
       ultag.classList.toggle("active");
        ultag.classList.contains("active") ? cancelbtn() : playbtn();
       
      });
      function cancelbtn() {
        menu.src = "imgs/icon-close.svg";
      }
      function playbtn() {
        menu.src = "imgs/icon-hamburger.svg";
      }
</script>