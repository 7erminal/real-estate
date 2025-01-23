import React, { useRef, useState } from 'react'
import { createRoot } from 'react-dom/client'
import AddCategoryFormModal from './addCategoryFormModal';
import AddSubCategoriesFormModal from './addSubCategoriesFormModal';
// @ts-ignore
import Api from "../utils/apis/apis.js"
// @ts-ignore
import { ROUTES } from "../utils/apis/endpoints.js"

const AddCategoryButton: React.FC = ()=>{
    const [showModal, setShowModal] = useState(false);
    const [showSubsModal, setShowSubsModal] = useState(false);
    const [categoryName, setCategoryName] = useState('')
    const [subCategories, setSubCategories] = useState([""])
    const [hasSubs, setHasSubs] = useState(false)
    const [categoryImage, setCategoryImage] = useState<File | undefined | null>()
    const [categoryId, setCategoryId] = useState(0)

    const fileRef = useRef<HTMLInputElement>(null)

    const handleModalClose = () => setShowModal(false);
    const handleModalShow = () => {
        setCategoryName('')
        setHasSubs(false)
        setSubCategories([""])
        fileRef.current != null ? fileRef.current!.value = "" : ''
        setShowModal(true)
    };

    const handleSubsModalClose = () => setShowSubsModal(false);
    const handleSubsModalShow = () => setShowSubsModal(true);

    const addCategory = async ()=>{
        const formData: any = new FormData();

        formData.append('categoryname', categoryName)
        formData.append('imageFile', categoryImage)
        // Send to add category
        await new Api().postMultipart_(formData, ROUTES.addCategory).then((response: any)=>{
            console.log("Response is ")
            console.log(response)
            console.log(response.status)
            if(response.status == 200){
                console.log("Response status is 200...")
                setCategoryName('')
                setHasSubs(false)
                setSubCategories([""])
                fileRef.current != null ? fileRef.current!.value = "" : ''
                // setCategoryId(response.)
                handleModalClose()

                setCategoryId(response.data)

                if(hasSubs==true){
                    // Open add sub category modal
                    handleSubsModalShow()
                } else {
                    window.location.reload();
                }
            }
        }).catch((error: any)=> {
            console.log("Error returned is ... ")
            console.log(error)
        })
    }

    const addSubCategories = async ()=>{
        // subs to be added
        console.log("Subs to be added...")
        console.log(subCategories)

        // Send to add sub category
        console.log("Subs added")

        var params = {
            "categoryid": categoryId,
            "subCategories": subCategories
        }

        await new Api().post_(params, ROUTES.addSubCategory).then((response: any)=>{
            console.log("Response is ")
            console.log(response)
            console.log(response.status)
            if(response.status == 200){
                console.log("Response status is 200...")
                setCategoryName('')
                setHasSubs(false)
                setSubCategories([""])
                fileRef.current != null ? fileRef.current!.value = "" : ''
                // setCategoryId(response.)
                handleSubsModalClose()
                window.location.reload();
            }
        }).catch((error: any)=> {
            console.log("Error returned is ... ")
            console.log(error)
        })
    }

    const addExtraSub = ()=>{
        setSubCategories([...subCategories, ""])
    }

    return <><button className="ml-1 button-item-env" type="button" onClick={handleModalShow} style={{border: "none", color: "black"}}>
                <i className="fas fa-plus fa-lg button-item-inv" style={{color: "#0ea2fc"}}></i>&nbsp; <span className="button-item-inv">Add</span>
            </button>
            <AddCategoryFormModal fileRef={fileRef} setCatImage={setCategoryImage} setHasSubs={setHasSubs} hasSubs={hasSubs} show={showModal} addCategory={addCategory} handleClose={handleModalClose} catName={categoryName} setCatName={setCategoryName} />
            <AddSubCategoriesFormModal addExtraSub={addExtraSub} handleClose={handleSubsModalClose} show={showSubsModal} addSubCategory={addSubCategories} subCategories={subCategories} setSubCategories={setSubCategories} />
            </>
}

if(document.getElementById('addCategoryButton')){
    createRoot(document.getElementById('addCategoryButton')!).render(<AddCategoryButton />)
}