import React, { useState, useEffect } from "react";
import { createRoot } from 'react-dom/client';
import CategoriesHeader from "./categoriesHeader";
import ReactDisplayController from "./reactDisplayController";
import { VALUES } from "./../utils/values"
import axios from "axios";
import CategoriesSubsHeader from "./categoriesSubsHeader";

const ShowItems: React.FC = ()=>{
    const [items, setItems] = useState<Array<any>>([])
    const [cart, setCart] = useState<Array<any>>([])
    const [categories, setCategories] = useState<Array<any>>([])
    const [categoryInfo, setCategoryInfo] = useState<any>()
    const [categoryid, setCategoryid] = useState<string>((document.getElementById("categoryid-items") as HTMLInputElement).value)
    const [subCategoryId, setSubCategoryId] = useState<any>((document.getElementById("sub-categoryid-items") as HTMLInputElement).value)
    const [selectedCategory, setSelectedCategory] = useState<any>()
    const [selectedSubCategory, setSelectedSubCategory] = useState<any>()
    const type = (document.getElementById("category-type") as HTMLInputElement).value
    const [csrfField, setCsrfField] = useState((document.querySelector("meta[name='csrf-token']") as HTMLInputElement).getAttribute("content"))

    useEffect(()=>{
        console.log("About to go get details")
        getData().then(response=>{
            console.log("data response is "+response)
            console.log(response.data.categoryid)

            setItems(response.data.items)
            setCategories(response.data.categories)
            if(response.data.categoryid != "all"){
                setCategoryid(response.data.categoryid.id)
                setSelectedCategory(response.data.categoryid)
                setSubCategory(response.data.categoryid)
            } else {
                setCategoryid(response.data.categoryid)
            }
        })
    },[])

    const addToCart = (item)=>{
		const cart_ = new ReactDisplayController().addToCart(item)

		console.log(cart);

        setCart(cart_)

	}

	const setCategory = (cat)=>{
        if(cat=="all"){
            setCategoryid(cat)
            setSelectedSubCategory(undefined)
        } else {
            console.log("Categories is not all")
            setCategoryid(cat.id)
            // console.log("About to set the selected category")
            // console.log(cat)
            setSelectedCategory(cat)

            setSubCategory(cat)
        }
	}

    const setSubCategory = (cat)=>{
        console.log("About to check category ")
        console.log(cat)
        if(cat.sub_categories != null){
            console.log("sub category is not null")
            cat.sub_categories.map(subCat=>{
                console.log("Sub category name is "+subCat.sub_category)
                console.log("Type is "+subCategoryId)
                if(subCat.sub_category==subCategoryId){
                    console.log("Setting sub category")
                    setSubCategoryId(subCat.id)
                    setSelectedSubCategory(subCat)
                }
            })
        } else {
            setSubCategoryId("0")
            setSelectedSubCategory(undefined)
        }
    }

    const getSubCategoryId = (subCat)=>{
        console.log("Sub category is ")
        console.log(subCat)
        if(subCat=="0"){
            setSubCategoryId(subCat)
            setSelectedSubCategory(undefined)
        } else {
            console.log("Sub category is ")
            console.log(subCat.sub_category)
            setSubCategoryId(subCat.id)
            setSelectedSubCategory(subCat)
        }
	}

    const getData = async ()=>{
        console.log("Going to get the items")
        console.log(`${VALUES.backendBaseEndpoint}/api/categories/items/${categoryid}&${type}&0`)
        const res = await axios(`${VALUES.backendBaseEndpoint}/api/categories/items/${categoryid}&${type}&0`);
        console.log("Items response is ")
        console.log(res)
   		return res;
    }

    return (<div>
        <CategoriesHeader categories = { categories } categoryinfo={ categoryInfo } cart={ cart } csrfField={ csrfField } setCategory={ setCategory }/>
        {
            selectedCategory != undefined && selectedCategory != null ?
                selectedCategory.sub_categories != undefined && selectedCategory.sub_categories != null && selectedCategory.sub_categories.length > 0 ?
                    <CategoriesSubsHeader setSubCategoryId={getSubCategoryId} category={selectedCategory} cart={ cart } csrfField={ csrfField } />
                : '' : ''
        }
        <hr/>
        <div className="container mt-4">
    <div className="row no-gutters" id="items-row">
        
    {
        items != null && items != undefined ? items.filter(item=>item.categoryid==categoryid || categoryid == "all" ).filter(item=>(subCategoryId == "0" || (selectedSubCategory != undefined && item.sub_category == selectedSubCategory.sub_category))).map((item,i)=>{
            const url = "/storage/"+item.item_image_path
            // console.log("image url: "+
            //     url+"\nItem: "+item.iid)
            // console.log("image url: "+url+"\nItem ID: "+item.id)
            // console.log("ITEMS")
            // console.log(items)
            // console.log(item)

        return <div key={i} className="col-lg-4 col-md-4 col-sm-6" data-aos="fade-right" data-aos-duration="600" data-aos-easing="ease-in-out">
            {/* <div style={{width: '100%', backgroundColor: 'blue', height: '20px'}}></div> */}
            <form action="/viewItem" method="get" id="saveForm" encType="multipart/form-data" className="saveForm">
                    <input type="hidden" name="csrf_token" value={ csrfField ?? "" } />
                    <input type="hidden" name="itemid" value={ item.iid } />
                    <div className="items-item mx-auto" style={{backgroundImage: "url('"+url+"')", backgroundPosition: 'center', backgroundSize: 'cover'}}>
                        {/* <img src={ url } width="100%" /> */}
                        <button className="linkToItems getCartBtn" type="submit"></button>
                    </div>
                    <div className="col-12 item-content">
                        <div className="d-flex justify-content-between"><h6>{ item.item_name }</h6><b>₵{ item.item_price }</b></div>
                        <div className="row">
                            <div className="col-sm-4" style={{textAlign: 'center'}}>
                                <h3>{item.number_of_rooms}</h3>
                                <p>bedrooms</p>
                            </div>
                            <div className="col-sm-4" style={{textAlign: 'center'}}>
                                <h3>{item.number_of_washrooms}</h3>
                                <p>washrooms</p>
                            </div>
                            <div className="col-sm-4" style={{textAlign: 'center'}}>
                                <h3>{item.number_of_balconies}</h3>
                                <p>balconies</p>
                            </div>
                        </div>
                        <p>
                            
                        </p>
                    </div>
                    {/* <div className="row">
                        <button type="button" className="btn btn-success addToCartButtonDiv mx-auto" onClick={ () =>addToCart(item) }><i className="fas fa-cart-arrow-down"></i> Add to Cart</button>    	
                    </div> */}
            </form>
        </div>
        }) : ''
    }
    {/* {
        items != null && items != undefined ? items.filter(item=>item.categoryid==categoryid || categoryid == "all" ).map((item,i)=>{
            console.log("Item one is ...")
            console.log(item)
            console.log("selected sub category is ...")
            console.log(selectedSubCategory)
            return <></>
        }) : ''
    } */}
        </div>
    </div>
</div>
        )
}

if(document.getElementById('categoryItemsDiv')){
    createRoot(document.getElementById('categoryItemsDiv')!).render(<ShowItems />)
}