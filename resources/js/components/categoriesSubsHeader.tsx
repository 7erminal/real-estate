import React from 'react'
import { Col, Row } from 'react-bootstrap'

type Props = {
	category: any
	csrfField: string | null
	cart: Array<any>
    setSubCategoryId: (id: string)=>void
}

const CategoriesSubsHeader: React.FC<Props> = ({category, csrfField, cart, setSubCategoryId}) =>{
	// console.log("Sub CATEGORY:::")
    // console.log(category)

	return(<div><div className="">
        <div className="container-fluid">
            <Row>
                <Col>
                    View more
                </Col>
            </Row>
            <div className="d-flex ">
            	<div className="mr-auto p-2">
            	<form action='/' method='get'>
                    <input type="hidden" name="csrf_token" value={ csrfField ?? "" } />
                            <input type="hidden" name="cart" value={ JSON.stringify(cart) } id='cartHidden'/>
            	</form> 
            	{
                	category.sub_categories != null && category.sub_categories != undefined ? category.sub_categories.map((subCat,i)=>{
                		// console.log(`category is ${category.category_name ?? "NUN"}`)
                			return <span key={i}> 
                		        <button type='button' className="linkToItems3" onClick={ ()=>setSubCategoryId(subCat) }>{ subCat.sub_category }</button> 
                            </span>
                	}) : ''
                }
            	</div>
            </div>
        </div>
    </div>
    </div>)
}

export default CategoriesSubsHeader