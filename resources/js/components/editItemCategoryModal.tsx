import React, { Dispatch, SetStateAction, useEffect, useState } from "react";
import { Form, Modal } from "react-bootstrap";

type Props = {
    show: boolean
    handleClose: ()=>void
    categories: Array<any>
    setCategory: Dispatch<SetStateAction<string>>
    initialCategoryName: string
    initialCategoryId: string
    initialCategory: any
    refButton: React.RefObject<HTMLButtonElement>
}

const EditItemCategoryModal: React.FC<Props> = ({refButton, show, handleClose, categories, setCategory, initialCategory, initialCategoryName, initialCategoryId })=>{
    const [selectedCategory, setSelectedCategory] = useState<any>()

    useEffect(()=>{
        console.log("Selected category is ")
        console.log(initialCategory)
        setSelectedCategory(initialCategory)
    },[initialCategory])

    const categoryChange = (e: React.ChangeEvent<HTMLSelectElement>)=>{
        let found = false;
        for(let c=0; c<categories.length; c++){
            if(categories[c].id==e.target.value){
                (refButton.current!.parentElement!.previousElementSibling!.previousElementSibling as HTMLInputElement).value = categories[c].category_name
                setCategory(categories[c].category_name)
                setSelectedCategory(categories[c])

                if(categories[c].sub_categories.length<1){
                    (refButton.current!.parentElement!.previousElementSibling as HTMLInputElement).value = ""
                }
                found = true;
            }
        }

        if(found==false){
            (refButton.current!.parentElement!.previousElementSibling as HTMLInputElement).value = ""
        } 
    }

    const subCategoryChange = (e: React.ChangeEvent<HTMLSelectElement>)=>{
        (refButton.current!.parentElement!.previousElementSibling as HTMLInputElement).value = e.target.value
        console.log("Sub category value is "+e.target.value)
    }

    return <Modal show={show} onHide={handleClose} centered>
    <Modal.Header closeButton>
      <Modal.Title>Change Category</Modal.Title>
    </Modal.Header>
    <Modal.Body>
        <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
            <Form.Label>Select a category</Form.Label>
            <select onChange={(e)=>categoryChange(e)} className="cust-form-select" aria-label="Default select example" required>
                <option value={initialCategoryId}>{initialCategoryName}</option>
                {
                    categories.map((ct: any, i: number)=>{
                        return <option key={i} value={ct.id}>{ ct.category_name }</option>
                    })
                }
            </select>
        </Form.Group>
    </Modal.Body>
    <Modal.Footer>
        <button type="button" onClick={handleClose} className="btn btn-info mx-2">Done</button>
    </Modal.Footer>
  </Modal>
}

export default EditItemCategoryModal