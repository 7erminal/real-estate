import React, { useState, useEffect, useRef } from "react";
import { Col, Form, Modal, Row } from "react-bootstrap";
// @ts-ignore
import Api from "../utils/apis/apis.js"
// @ts-ignore
import { ROUTES } from "../utils/apis/endpoints.js"

type Props = {
    show: boolean
    handleClose: ()=>void
    catName: string | undefined
    catId: number | undefined
    imagePath: string | undefined
    addSubsButtonClick: ()=>void
}

const EditCategoryModal: React.FC<Props> = ({show, handleClose, catName, catId, imagePath, addSubsButtonClick})=>{
    const [categoryName, setCategoryName] = useState('')
    const [categoryImage, setCategoryImage] = useState<File | undefined | null>()
    const fileRef = useRef<HTMLInputElement>(null)

    useEffect(()=>{
        console.log("About to set category to ")
        console.log(catName)
        console.log(catId)
        setCategoryName(catName ?? "")
    },[])

    const editCat = async (e)=>{
        e.preventDefault()

        const formData: any = new FormData();

        console.log("About to send these...")
        console.log("Category name "+categoryName)

        let proceed = false

        // format category name
        let tempCatName = ''
        if(categoryName == '' && catName != ''){
            tempCatName = catName ?? ""

            proceed = true
        }

        if(categoryName != '' && catName == ''){
            tempCatName = categoryName ?? ""

            proceed = true
        }

        if(categoryName != '' && catName != ''){
            tempCatName = categoryName ?? ""

            proceed = true
        }

        if(proceed == true){
            formData.append('categoryId', catId)
            formData.append('newDescription', tempCatName)
            formData.append('imageFile', categoryImage)

            await new Api().postMultipart_(formData, ROUTES.editCategory).then((response: any)=>{
                console.log("Response is ")
                console.log(response)
                console.log(response.status)
                if(response.status == 200){
                    console.log("Response status is 200...")
                    handleClose()
                    window.location.reload();
                }
            }).catch((error: any)=> {
                console.log("Error returned is ... ")
                console.log(error)
            })
        }
    }

    const deleteCat = async ()=>{
        await new Api().get_(`${ROUTES.deleteCategory}/${catId}`).then((response: any)=>{
            console.log("Response is ")
            console.log(response)
            console.log(response.status)
            if(response.status == 200){
                console.log("Response status is 200...")
                if(response.data=="SUCCESS"){
                    handleClose()
                    window.location.reload();
                } else {
                    alert("You are not allowed to delete this category");
                }
                
            }
        }).catch((error: any)=> {
            console.log("Error returned is ... ")
            console.log(error)
        })
    }

    const onInputChange = (e)=>{
        setCategoryName(e.target.value)
    }

    return <Modal show={show} onHide={handleClose} centered>
    <Modal.Header closeButton>
      <Modal.Title>Category Name</Modal.Title>
    </Modal.Header>
    <Modal.Body>
        <Form onSubmit={(e)=>editCat(e)}>
            <div className="form-group col">
                <div><label htmlFor="text-input" className=" form-control-label">Edit Category</label></div>
                <div>
                    <input type="text" id="text-input" defaultValue={catName} onChange={(e)=>onInputChange(e)} name="categoryName" placeholder="Enter Category Name" className="form-control form-control-sm" required/>
                </div>
            </div>
            <Row>
                <Col style={{justifyContent: 'center', display: 'flex', alignItems: 'center'}}>
                    <div style={{width:"80px", height: "84px", overflow: "hidden", border: "1px solid #eff1f2", borderRadius: "3px", backgroundColor: "white"}}><img src={ "/storage/"+imagePath } alt={ "noimage.jpg" } width="100%"/></div>
                    <input type="file" ref={fileRef} onChange={(e: React.ChangeEvent<HTMLInputElement>)=>setCategoryImage(e.target.files![0])} name="categoryImage" className="mt-3 mx-1" />
                </Col>
            </Row>
            <Row>
                <Col>
                    <button type="button" className="btn btn-primary btn-sm my-4" onClick={addSubsButtonClick}>
                        <i className="fa fa-dot-circle-o"></i> Add Sub Categories
                    </button>
                </Col>
            </Row>
            <Row>
                <Col>
                    <button type="submit" className="btn btn-primary btn-sm my-4">
                        <i className="fa fa-dot-circle-o"></i> Save
                    </button>
                    <button type="button" onClick={deleteCat} className="btn btn-danger btn-sm my-4 mx-4">
                        <i className="fa fa-dot-circle-o"></i> Delete
                    </button>
                </Col>
            </Row>
        </Form>
    </Modal.Body>
  </Modal>
}

export default EditCategoryModal