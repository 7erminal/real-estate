import React, { useEffect, useRef, useState } from "react";
import { createRoot } from 'react-dom/client'
import EditItemCategoryModal from "./editItemCategoryModal";

const EditItemCategoryButton: React.FC = ()=>{
    const [catName, setCatName] = useState('')
    const [catId, setCatId] = useState('')
    const [showModal, setShowModal] = useState(false);
    const categories = JSON.parse((document.getElementById("categories") as HTMLInputElement).value)
    const [selectedCategory, setSelectedCategory] = useState<any>()

    const refButton = useRef<HTMLButtonElement>(null)

    const handleModalClose = () => setShowModal(false);
    const handleModalShow = () => {
        setShowModal(true)
    };

    useEffect(()=>{
        let tcatName = (refButton.current!.parentElement!.previousElementSibling!.previousElementSibling as HTMLInputElement).value

        // console.log("Element is ")
        // previousElementSibling
        // console.log(refButton.current!.parentElement!.previousElementSibling!.previousElementSibling)
        setCatName(tcatName)
        setCat()
    },[])

    useEffect(()=>{
        console.log("Change in this")
        for(let c=0; c<categories.length; c++){
            if(categories[c].category_name==catName){
                (refButton.current!.parentElement!.previousElementSibling!.previousElementSibling as HTMLInputElement).value = categories[c].category_name
                setCatName(categories[c].category_name)
                setCatId(categories[c].id)
                setSelectedCategory(categories[c])
            }
        }
    },[catName])

    const setCat = ()=>{
        for(let c=0; c<categories.length; c++){
            if(categories[c].category_name==catName){
                (refButton.current!.parentElement!.previousElementSibling!.previousElementSibling as HTMLInputElement).value = categories[c].category_name
                setCatName(categories[c].category_name)
                setCatId(categories[c].id)
                setSelectedCategory(categories[c])
            }
        }
    }

    return <>
        <button type="button" ref={refButton} onClick={handleModalShow} className="btn btn-info mx-2">{catName}</button>
        <EditItemCategoryModal refButton={refButton} initialCategory={selectedCategory} initialCategoryId={catId} initialCategoryName={catName} handleClose={handleModalClose} show={showModal} categories={categories} setCategory={setCatName} />
    </>
}

// if(document.getElementById('catChangeButton')){
//     createRoot(document.getElementById('catChangeButton')!).render(<EditItemCategoryButton />)
// }

var els = document.getElementsByClassName("catChangeButton");

Array.prototype.forEach.call(els, function(el) {
    // Do stuff here
    console.log(el.tagName);
    createRoot(el!).render(<EditItemCategoryButton />)
});