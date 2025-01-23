import React, { Dispatch, SetStateAction, useState } from "react";
import { Form, Modal } from "react-bootstrap";

type Props = {
    show: boolean
    handleClose: ()=>void
    subCategories: Array<string>
    setSubCategories: Dispatch<SetStateAction<Array<string>>>
    addSubCategory: ()=>void
    addExtraSub: ()=>void
}

const AddSubCategoriesFormModal: React.FC<Props> = ({show, handleClose, subCategories, setSubCategories, addSubCategory, addExtraSub})=>{
    const setSubCat = (i: number, v: string)=>{
        console.log("About to set string to "+v)
        console.log("Array is ")
        console.log(subCategories)
        let tempSubCats = subCategories.map((sc: string, r: number)=>{
            if(i==r){
                return v;
            } else {
                return sc;
            }
        })
        console.log("New sub categories are ")
        console.log(tempSubCats)
        setSubCategories(tempSubCats)
    }

    return <Modal show={show} onHide={handleClose} centered>
    <Modal.Header closeButton>
      <Modal.Title>Sub-Category Name</Modal.Title>
    </Modal.Header>
    <Modal.Body>
        <div className="form-group col">
            <div><label htmlFor="text-input" className=" form-control-label">Sub Category Name</label></div>
            <div>
                {
                    subCategories.map((sc: string, i: number)=>{
                        return <input key={i} type="text" id="text-input" value={sc} onChange={(e)=>setSubCat(i, e.target.value)} name="subCategoryName" placeholder="Enter Sub-Category Name" className="form-control form-control-sm mb-1" />
                    })
                }
                </div>
        </div>
        <div className="flex float-right">
            <i className="fas fa-plus fa-lg button-item-inv mx-3" style={{color: "#0ea2fc"}} onClick={addExtraSub}></i>
        </div>
        <button type="button" className="btn btn-primary btn-sm my-4" onClick={()=>addSubCategory()}>
            <i className="fa fa-dot-circle-o"></i> Add Sub-Categories
        </button>
    </Modal.Body>
  </Modal>
}

export default AddSubCategoriesFormModal