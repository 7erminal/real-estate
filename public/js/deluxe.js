 $(document).ready(function(){
    var popovercontent = `<button type='button' class='btn btn-danger'>Remove</button>
    <button type="button" class="btn btn-sm btn-link" onclick="alert('event raised from no button');">No</button>`;
    $('.popoverbutton').popover({
      content:popovercontent,
      html:true,
      container:'body',
      trigger: 'focus'
    });

    $('.small-view-item').off('click').on('click',function(){
        console.log("image clicked");
        const url = $(this).children("img").prop('src');
        const html = '<img src="'+url+'" width="100%" />';
        $('.single-item').html(html);
    });

 });




$('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();

});


// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


// Menu visibility on hover
let outT = 0;

// $('.menu').mouseenter(function (){
//   if(outT>0){
//     $('#hiddenMenu').css({
//         "display":"none"
//       });
//   }
  
//   outT=0;
//   console.log("outT back to "+outT);
//   console.log("the value is "+$(this).data("value"));
//   $('#hiddenMenu').css({
//     "display":"inline-block"
//   });
//   const menu_name = $(this).data("value");
//   $('#hiddenMenu').children('.navlinks').each(function (){
//     console.log("menu is "+$(this).data("value")+" against "+menu_name);
//     $(this).css({"display":"hide"})
//       if(menu_name==$(this).data("value")){
//           $(this).css({"display":"block"})
//       }
//   });
// });

// $('#hiddenMenu').mouseenter(function(){
//    outT=0;
//    console.log("outT back to "+outT);
// });

// $('.menu').mouseleave(function(){
//    outT++;
//    console.log("outT out of main menu is "+outT);
//    closeMenu();
// });

// $('#hiddenMenu').mouseleave(function(){
//    outT++;
//    outT++;
//    console.log("outT out of hidden menu is "+outT);
//    closeMenu();
// });

function closeMenu(){
  console.log("outT is "+outT);
  if(outT>1){
      $('#hiddenMenu').css({
        "display":"none"
      });

      $('#navlink').css({
        "display":"none"
      })
   }
}


AOS.init();

// You can also pass an optional settings object
// below listed default settings
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});

// AOS.refresh();

$(document).on({
    scroll: function () {
      parallaxImg();
    }, ready: function () {
      parallaxImg();
    }
  });

function parallaxImg () {
	var img = $('.img-parallax');
	var imgParent = img.parent();
    var speed = img.data('speed');
    var imgY = imgParent.offset().top;
    var winY = $(this).scrollTop();
    var winH = $(this).height();
    var parentH = imgParent.innerHeight();


    // The next pixel to show on screen      
    var winBottom = winY + winH;

    // If block is shown on screen
    if (winBottom > imgY && winY < imgY + parentH) {
      // Number of pixels shown after block appear
      var imgBottom = ((winBottom - imgY) * speed);
      // Max number of pixels until block disappear
      var imgTop = winH + parentH;
      // Porcentage between start showing until disappearing
      var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
    }
    img.css({
      top: imgPercent + '%',
      transform: 'translate(-50%, -' + imgPercent + '%)'
    });
  }


$('.img-parallax').each(function(){
  var img = $(this);
  var imgParent = $(this).parent();
});


function quantityIncreaseOrDecrease(itemkey,action,quantityavailable){
    

    $(".itemRows").each(function(){
      console.log("Value is "+$(this).children(".itemid").val()+" and key is "+itemkey);

      if($(this).children(".itemid").val()==itemkey){
        console.log("I match")

        quantity = $(this).children(".itemquantity").val();
        let count = quantity

        action=="increase" ? count < quantityavailable ? count++ : "" : action=="decrease" ? count <= 1 ? "" : count -- : ""

        let cart = JSON.parse(document.getElementById("theCart").value);
        let totalamount = 0;
        let overallamount = 0;

        cart.map((cart, i)=>{
          
          if(cart[0].iid==itemkey){
            cart[1].quantity = count
            totalamount = cart[0].item_price * cart[1].quantity
          }

          console.log("Item id is "+cart[0].iid+"\nOverall amount is initially "+overallamount+". Number of items being purchased is "+cart[1].quantity)

          console.log(overallamount+" + ("+cart[0].item_price+" x "+cart[1].quantity+")")

          overallamount = overallamount + (cart[0].item_price * cart[1].quantity)

          console.log("= "+overallamount)
       })

        // Setting cart value in each item form
        let hiddenCart = document.getElementsByClassName("cartItems")

        Array.prototype.forEach.call(hiddenCart, function(hc) {
        // Do stuff here
        hc.value = JSON.stringify(cart)
            });


        $(".overallTotal").html(overallamount)
        $(".subTotal").html(overallamount)
        $(this).children(".totalamount").html("₵"+totalamount)
        $(this).children("td").children("div").children(".product_num").html(count)
        $(this).children(".itemquantity").val(count);
      }
    });
  }

let itemPrice = 0;
// let itemQuantity = 1;
let itemsInCart = 0;
let itemTotalQuantity = 0;

function addtocart(item,itemQuantity=1){
  let cart = JSON.parse(document.getElementById("theCart").value);

      console.log(item);
      console.log("\nand current price is "+itemPrice);
      console.log("\ncart is: \n");
      console.log(cart);
      console.log("\nEnd Cart \n");
      // item = [...item, {quantity: 0}]

      let addProceed = true;

      cart.map((cart, i)=>{
        console.log(cart[0].iid+" and "+item.iid)
        if(cart[0].iid==item.iid){
          addProceed = false;
          cart[1].quantity = cart[1].quantity + itemQuantity;

          cart[1].quantity > cart[0].quantity_available ? cart[1].quantity=cart[0].quantity_available : ""
        }
      });
        
        if(addProceed==true){
          cart = [...cart, [item,{quantity: itemQuantity}]] ;
        }
        

        this.updatePrice(cart);

        

        let cartLength = cart.length;

        let htmlCartCount = document.getElementById("cartCount");
        // let htmlCart = document.getElementById("theCart")
        // htmlCart.value = JSON.stringify(cart)
        // document.getElementById("cartCountHidden").value = itemTotalQuantity
        htmlCartCount.innerHTML = cartLength;

        // Setting cart value in each item form
        let hiddenCart = document.getElementsByClassName("cartItems");

        Array.prototype.forEach.call(hiddenCart, function(hc) {
        // Do stuff here
        console.log("adding cart...");
        hc.value = JSON.stringify(cart);
    });

        this.getData(cart).then(response=>{
        console.log("response is "+JSON.stringify(response));

      });
}

function updatePrice(cart){
      const cartArray = cart;
      const cartCount = cartArray.length;
      let price = 0;
      let quantity = 0;

      cartArray.map(CartItem => { 
        price = price + (CartItem[0].item_price * CartItem[1].quantity)
        quantity = CartItem[1].quantity + quantity

      });
      itemsInCart = cartCount;
      itemPrice = price;
      itemTotalQuantity = quantity;

    }

    async function getData(cart){
        try {
    const config = {
        method: 'get',
        url: '/api/updateCart/',
        params:{ cart: JSON.stringify(cart), sessionid: jQuery('meta[name="csrf-token"]').attr('content') }
    }

    console.log("params are "+JSON.stringify(cart))
          const res = await axios(config);
   
          return await res;
      } catch (err){
        return {err};
      }
    } 



