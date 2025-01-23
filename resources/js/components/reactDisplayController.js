import React from 'react'
import ReactDOM from 'react-dom';



let itemPrice = 0;
// let itemQuantity = 1;
let itemsInCart = 0;
let itemTotalQuantity = 0;


class ReactDisplayController {

	addToCart(item, itemQuantity=1){
	let cart = JSON.parse(document.getElementById("theCart").value);

      console.log(item)
      console.log("\nand current price is "+itemPrice)
      console.log("\ncart is: \n")
      console.log(cart)
      console.log("\nEnd Cart \n")
      // item = [...item, {quantity: 0}]

      let addProceed = true;

      cart.map((cart, i)=>{
      	console.log(cart[0].iid+" and "+item.iid)
      	if(cart[0].iid==item.iid){
      		addProceed = false;
      		cart[1].quantity = cart[1].quantity + itemQuantity

      		cart[1].quantity > cart[0].quantity_available ? cart[1].quantity=cart[0].quantity_available : ""
      	}
      })
      	
      	if(addProceed==true){
      		cart = [...cart, [item,{quantity: itemQuantity}]]	
      	}
        

        this.updatePrice(cart)

        

        let cartLength = cart.length

        let htmlCartCount = document.getElementById("cartCount")
        // let htmlCart = document.getElementById("theCart")
        // htmlCart.value = JSON.stringify(cart)
        // document.getElementById("cartCountHidden").value = itemTotalQuantity
        htmlCartCount.innerHTML = cartLength

        // Setting cart value in each item form
        let hiddenCart = document.getElementsByClassName("cartItems")

        Array.prototype.forEach.call(hiddenCart, function(hc) {
    		// Do stuff here
    		console.log("adding cart...")
	    	hc.value = JSON.stringify(cart)
		});

        this.getData(cart).then(response=>{
        console.log("response is "+JSON.stringify(response))

      })


		console.log(cart)

		return cart;
      
    }

	updatePrice(cart){
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

    displayItemQuantity(){
    	return itemQuantity;
    }

    async getData(cart){
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

}

export default ReactDisplayController



