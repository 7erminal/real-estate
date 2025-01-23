import React, { useEffect, useRef, useState } from 'react'
import { createRoot } from 'react-dom/client'
import AddCategoryFormModal from './addCategoryFormModal';
import AddSubCategoriesFormModal from './addSubCategoriesFormModal';
// @ts-ignore
import Api from "../utils/apis/apis.js"
// @ts-ignore
import { ROUTES } from "../utils/apis/endpoints.js"
import AddItemFormModal from './addItemFormModal.js';

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

const AddItemButton: React.FC = ()=>{
    const [showModal, setShowModal] = useState(false);
    const [images, setImages] = useState<FileList | undefined | null>()

    const categories = JSON.parse((document.getElementById("categories") as HTMLInputElement).value)
    const features = JSON.parse((document.getElementById("features") as HTMLInputElement).value)
    const purposes = JSON.parse((document.getElementById("purposes") as HTMLInputElement).value)

    const tempItem: ItemForm = {
        itemName: "",
        category: "",
        noOfRooms: "",
        quantity: "",
        colors: "",
        sizes: "",
        price: "",
        description: "",
        noOfBalconies: "",
        noOfWashrooms: ""

    }

    const [addItemForm, setAddItemForm] = useState<ItemForm>(tempItem)

    const fileRef = useRef<HTMLInputElement>(null)

    const handleModalClose = () => setShowModal(false);
    const handleModalShow = () => {
        fileRef.current != null ? fileRef.current!.value = "" : ''
        setShowModal(true)
    };

    const addItem = async ()=>{
        const formData: any = new FormData();

        console.log("Item name is "+addItemForm.itemName)
        formData.append('itemname', addItemForm.itemName)
        console.log("Item category is "+addItemForm.category)
        formData.append('category', addItemForm.category)
        console.log("Item rooms is "+addItemForm.category)
        formData.append('noOfRooms', addItemForm.noOfRooms)
        console.log("Item quantity is "+addItemForm.quantity)
        formData.append('quantity', addItemForm.quantity)
        console.log("Item colors is "+addItemForm.colors)
        formData.append('colors', addItemForm.colors)
        console.log("Item sizes is "+addItemForm.sizes)
        formData.append('sizes', addItemForm.sizes)
        console.log("Item price is "+addItemForm.price)
        formData.append('price', addItemForm.price)
        console.log("Item description is "+addItemForm.description)
        formData.append('description', addItemForm.description)
        console.log("Item features are "+addItemForm.noOfBalconies)
        formData.append('noOfBalconies', addItemForm.noOfBalconies)
        console.log("Item purposes are "+addItemForm.noOfWashrooms)
        formData.append('noOfWashrooms', addItemForm.noOfWashrooms)
        console.log("Images are "+images)
        // formData.append('imageFiles[]', images)

        for(var i=0; i<images!.length; i++){
            console.log("Adding image ")
            console.log(images![i])
            formData.append('imageFiles[]',images![i])
        }

        // Send to add category
        await new Api().postMultipart_(formData, ROUTES.addItem).then((response: any)=>{
            console.log("Response is ")
            console.log(response)
            console.log(response.status)
            if(response.status == 200){
                console.log("Response status is 200...")
    
                fileRef.current != null ? fileRef.current!.value = "" : ''
                // setCategoryId(response.)
                handleModalClose()
                window.location.reload();
            }
        }).catch((error: any)=> {
            console.log("Error returned is ... ")
            console.log(error)
        })
    }

    const inputChange = (inputName: string, value: string)=>{
        let tempFormValues = {
            itemName: addItemForm.itemName,
            category: addItemForm.category,
            noOfRooms: addItemForm.noOfRooms,
            quantity: addItemForm.quantity,
            colors: addItemForm.colors,
            sizes: addItemForm.sizes,
            price: addItemForm.price,
            description: addItemForm.description,
            noOfBalconies: addItemForm.noOfBalconies,
            noOfWashrooms: addItemForm.noOfWashrooms
        }

        console.log("Change is for "+inputName+" and value is "+value)

        if(inputName=="category"){
            tempFormValues.category = value
        } else if(inputName=="noOfRooms"){
            tempFormValues.noOfRooms = value
        } else if(inputName=="itemName"){
            tempFormValues.itemName = value
        } else if(inputName=="quantity"){
            tempFormValues.quantity = value
        } else if(inputName=="colors"){
            tempFormValues.colors = value
        } else if(inputName=="sizes"){
            tempFormValues.sizes = value
        } else if(inputName=="price"){
            tempFormValues.price = value
        } else if(inputName=="description"){
            tempFormValues.description = value
        } else if(inputName=="noOfBalconies"){
            tempFormValues.noOfBalconies = value
        } else if(inputName=="noOfWashrooms"){
            tempFormValues.noOfWashrooms = value
        }

        console.log(tempFormValues)

        setAddItemForm(tempFormValues)
    }

    useEffect(()=>{
        console.log("Item form changed")
        console.log(addItemForm)
    },[addItemForm])

    return <><div className="mx-auto button-item-env addItem">
                <i className="fas fa-plus fa-lg button-item-inv" onClick={handleModalShow} style={{color: "#0ea2fc"}}></i>&nbsp; <span className="button-item-inv" onClick={handleModalShow}>Add Item</span>
            </div>
            <AddItemFormModal setImages={setImages} itemForm={addItemForm} purposes={purposes} features={features} categories={categories} addItem={addItem} inputChange={inputChange} show={showModal} handleClose={handleModalClose}  />
            </>
}

if(document.getElementById('addItemButton')){
    createRoot(document.getElementById('addItemButton')!).render(<AddItemButton />)
}