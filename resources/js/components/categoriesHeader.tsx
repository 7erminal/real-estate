import React from 'react'

type Props = {
	categories: Array<any>
	setCategory: (id: any)=>void
	categoryinfo: any
	csrfField: string | null
	cart: Array<any>
}

const CategoriesHeader: React.FC<Props> = ({categories, setCategory, categoryinfo, csrfField, cart}) =>{
	// console.log("categories are "+JSON.stringify(categories[0]))

	return(<div><div className="pageBar">
        <div className="container">
            <div className="d-flex nav-div">
            	<div className="mr-auto p-2">
            	<form action='/' method='get'>
                    <input type="hidden" name="csrf_token" value={ csrfField ?? "" } />
                            <input type="hidden" name="cart" value={ JSON.stringify(cart) } id='cartHidden'/>
                <button className="linkToItems2" type="submit">home</button> / Properties
            	</form> 
				{/* <button type='button' className="linkToItems3" onClick={ ()=>setCategory('all') }>All</button>  */}
            	{
                	categories != null && categories != undefined ? categories.map((category,i)=>{
                		// console.log(`category is ${category.category_name ?? "NUN"}`)
                			return <span key={i}> 
                		| <button type='button' className="linkToItems3" onClick={ ()=>setCategory(category) }>{ category.category_name }</button> </span>
                	}) : ''
                }
            	</div>
                <div className="p-2">
                	{ categoryinfo != undefined && categoryinfo != null ? categoryinfo.category_name : "" }	
                </div>
            </div>
        </div>
    </div>
    </div>)
}

export default CategoriesHeader