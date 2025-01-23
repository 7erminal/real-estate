import React, { useState, useEffect } from "react";
import { Col, Form, Modal, Row } from "react-bootstrap";
// @ts-ignore
import Api from "../utils/apis/apis.js"
// @ts-ignore
import { ROUTES } from "../utils/apis/endpoints.js"

type Props = {
    show: boolean
    handleClose: ()=>void
    subCatName: string | undefined
    subCatId: number | undefined
}

const EditSubCategoryModal: React.FC<Props> = ({show, handleClose, subCatName, subCatId})=>{
    const [subCategory, setSubCategory] = useState('')

    useEffect(()=>{
        console.log("About to set sub category to ")
        console.log(subCatName)
        console.log(subCatId)
        setSubCategory(subCatName ?? "")
    },[])

    const editSubCat = async (e)=>{
        e.preventDefault()

        var params = {
            "subCategoryId": subCatId,
            "newDescription": subCategory
        }

        await new Api().post_(params, ROUTES.editSubCategory).then((response: any)=>{
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

    const deleteSubCat = async ()=>{
        await new Api().get_(`${ROUTES.deleteSubCategory}/${subCatId}`).then((response: any)=>{
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

    const onInputChange = (e)=>{
        setSubCategory(e.target.value)
    }

    return <Modal show={show} onHide={handleClose} centered>
    <Modal.Header closeButton>
      <Modal.Title>Category Name</Modal.Title>
    </Modal.Header>
    <Modal.Body>
        <Form onSubmit={(e)=>editSubCat(e)}>
            <div className="form-group col">
                <div><label htmlFor="text-input" className=" form-control-label">Edit Sub-Category</label></div>
                <div>
                    <input type="text" id="text-input" defaultValue={subCatName} onChange={(e)=>onInputChange(e)} name="subCategoryName" placeholder="Enter Sub Category Name" className="form-control form-control-sm" required/>
                </div>
            </div>
            <Row>
                <Col>
                    <button type="submit" className="btn btn-primary btn-sm my-4">
                        <i className="fa fa-dot-circle-o"></i> Save
                    </button>
                    <button type="button" onClick={deleteSubCat} className="btn btn-danger btn-sm my-4 mx-4">
                        <i className="fa fa-dot-circle-o"></i> Delete
                    </button>
                </Col>
            </Row>
        </Form>
    </Modal.Body>
  </Modal>
}

export default EditSubCategoryModal