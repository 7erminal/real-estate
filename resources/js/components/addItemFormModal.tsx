import React, { Dispatch, SetStateAction, useEffect, useState } from "react";
import { Form, Modal } from "react-bootstrap";

type ItemForm = {
    itemName: string
    category: string
    noOfRooms: string
    quantity: string
    colors: string
    sizes: string
    price: string
    description: string
    noOfBalconies: string
    noOfWashrooms: string
}

type Props = {
    show: boolean
    handleClose: ()=>void
    addItem: ()=>void
    itemForm: ItemForm
    inputChange: (vc: string, nt: string)=>void
    categories: any
    purposes: any
    features: any
    setImages: Dispatch<SetStateAction<FileList | null | undefined>>
}

const AddItemFormModal: React.FC<Props> = ({show, handleClose, addItem, itemForm, inputChange, categories, purposes, features, setImages })=>{
    const [selectedCategory, setSelectedCategory] = useState<any>()

    const postItem=(e: React.FormEvent<HTMLFormElement>)=>{
        e.preventDefault()

        addItem()
    }

    const setSelectedCat = (e: React.ChangeEvent<HTMLSelectElement>)=>{
        let found = false;
        for(let c=0; c<categories.length; c++){
            if(categories[c].id==e.target.value){
                inputChange("category", categories[c].category_name)
                setSelectedCategory(categories[c])
                found = true;
            }
        }

        if(found==false){
            setSelectedCategory(undefined)
            inputChange("subcategory", "")
        } 
    }

    useEffect(()=>{
        if(selectedCategory?.sub_categories.length < 1){
            inputChange("subcategory", "")
        }
    },[selectedCategory])

    useEffect(()=>{
        console.log("Categories are ")
        console.log(categories)
        console.log("Purposes are ")
        console.log(purposes)
        console.log("Categories are ")
        console.log(features)
    },[])

    return <Modal show={show} onHide={handleClose} size="lg" centered>
    <Modal.Header closeButton>
      <Modal.Title>Add property</Modal.Title>
    </Modal.Header>
    <Modal.Body>
        <Form onSubmit={(e)=>postItem(e)}>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Property Name</Form.Label>
                <Form.Control type="text" value={itemForm.itemName} onChange={(e)=>inputChange("itemName", e.target.value)} placeholder="Item name" required/>
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Select a category</Form.Label>
                <select onChange={(e)=>setSelectedCat(e)} className="cust-form-select" aria-label="Default select example">
                    <option value="">Select a category</option>
                    {
                        categories.map((ct: any, i: number)=>{
                            return <option key={i} value={ct.id}>{ ct.category_name }</option>
                        })
                    }
                </select>
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Number of rooms</Form.Label>
                <Form.Control type="text" value={itemForm.noOfRooms} onChange={(e)=>inputChange("noOfRooms", e.target.value)} placeholder="10" required/>
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Price</Form.Label>
                <Form.Control type="text" value={itemForm.price} onChange={(e)=>inputChange("price", e.target.value)} placeholder="10" required/>
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Description</Form.Label>
                <Form.Control as="textarea" rows={2} value={itemForm.description} onChange={(e)=>inputChange("description", e.target.value)} />
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Quantity</Form.Label>
                <Form.Control type="text" value={itemForm.quantity} onChange={(e)=>inputChange("quantity", e.target.value)} placeholder="1"/>
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Number of washrooms</Form.Label>
                <Form.Control type="text" value={itemForm.noOfWashrooms} onChange={(e)=>inputChange("noOfWashrooms", e.target.value)} placeholder="10" />
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Number of balconies</Form.Label>
                <Form.Control type="text" value={itemForm.noOfBalconies} onChange={(e)=>inputChange("noOfBalconies", e.target.value)} placeholder="2" />
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Available Colors</Form.Label>
                <Form.Control type="text" value={itemForm.colors} onChange={(e)=>inputChange("colors", e.target.value)} placeholder="white,yellow,green" />
            </Form.Group>
            <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
                <Form.Label>Available Sizes</Form.Label>
                <Form.Control type="text" value={itemForm.sizes} onChange={(e)=>inputChange("sizes", e.target.value)} placeholder="100 x 100 square feet" />
            </Form.Group>
            <Form.Group controlId="formFileMultiple" className="mb-3">
                <Form.Label>Add images</Form.Label>
                <Form.Control onChange={(e: React.ChangeEvent<HTMLInputElement>)=>setImages(e.target.files!)} type="file" multiple required />
            </Form.Group>
            <button type="submit" className="btn btn-primary btn-sm my-4">
                <i className="fa fa-dot-circle-o"></i> Submit
            </button>
        </Form>
    </Modal.Body>
  </Modal>
}

export default AddItemFormModal