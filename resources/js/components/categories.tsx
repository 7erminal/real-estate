import React, { useState, useEffect } from "react";
import { createRoot } from 'react-dom/client'
// @ts-ignore
import Api from "../utils/apis/apis.js"
// @ts-ignore
import { ROUTES } from "../utils/apis/endpoints.js"
import { ListGroup } from "react-bootstrap";
import EditSubCategoryModal from "./EditSubCategoryModal.js";
import "../css/customCss.css"
import EditCategoryModal from "./EditCategoryModal.js";
import AddSubCategoriesFormModal from "./addSubCategoriesFormModal.js";
import ViewImageModal from "./viewImageModal.js";

type SubCategory = {
    id: number
    category_id: number
    sub_category: string
    created_at: string
    updated_at: string
}

type Category = {
    category_name: string
    created_at: string
    id: number
    image_path: string
    updated_at: string
    sub_categories: Array<SubCategory>
}

const Categories: React.FC = ()=>{
    const [categories, setCategories] = useState<Array<Category>>([])
    const [showSubsModal, setShowSubsModal] = useState(false);
    const [showAddSubsModal, setShowAddSubsModal] = useState(false);
    const [showImageModal, setShowImageModal] = useState(false);
    const [showCatModal, setShowCatModal] = useState(false);
    const [selectedSub, setSelectedSub] = useState<SubCategory>();
    const [selectedCat, setSelectedCat] = useState<Category>();
    const [selectedImage, setSelectedImage] = useState('');

    const [subCategories, setSubCategories] = useState([""])
    const [hasSubs, setHasSubs] = useState(false)

    const handleCatModalClose = () => setShowCatModal(false);
    const handleCatModalShow = (cat: Category) => {
        setSelectedCat(cat)
        setShowCatModal(true);
    }

    const handleSubsModalClose = () => setShowSubsModal(false);
    const handleSubsModalShow = (subCat: SubCategory) => {
        setSelectedSub(subCat)
        setShowSubsModal(true);
    }

    const handleAddSubsModalClose = () => setShowAddSubsModal(false);
    const handleAddSubsModalShow = () => {
        setShowAddSubsModal(true);
    }

    const handleImageModalClose = () => setShowImageModal(false);
    const handleImageModalShow = (img: string) => {
        setSelectedImage(img);
        setShowImageModal(true)
    }

    useEffect(()=>{
        getCategories()
    },[])

    const getCategories = async ()=>{
        const formData: any = new FormData();

        // Send to add category
        await new Api().get_(ROUTES.getCategories).then((response: any)=>{
            console.log("Response is ")
            console.log(response)
            console.log(response.status)
            if(response.status == 200){
                console.log("Response status is 200...")
                setCategories(response.data.categories)
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

        var params = {
            "categoryid": selectedCat?.id,
            "subCategories": subCategories
        }

        await new Api().post_(params, ROUTES.addSubCategory).then((response: any)=>{
            console.log("Response is ")
            console.log(response)
            console.log(response.status)
            if(response.status == 200){
                console.log("Response status is 200...")
                setHasSubs(false)
                setSubCategories([""])
              
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

    const addSubsButtonClick = ()=>{
        handleCatModalClose()
        handleAddSubsModalShow()
    }

    return <div className="row">
    <table className="table table-hover">
        <thead className="thead-light">
          <tr>
            <th></th>
            <th>Category Name</th>
            <th>Sub Categories</th>
            <th>Image</th>
            <th>Date Added</th>
            <th></th>
          </tr>
        </thead>
        
        <tbody id="category-data">
            {
                categories?.map((category: Category, i: number)=>{
                    return <tr key={i} className="noneditFields row{{ $id }}">
                    <td>
                        <span>{i+1}</span>
                    </td>
                    <td>{category.category_name}</td>
                    <td>
                        <ListGroup variant="flush">
                            {
                                category.sub_categories.map((subCat: SubCategory, q: number)=>{
                                    return <ListGroup.Item key={q} action onClick={()=>handleSubsModalShow(subCat)} className="sub-cat-item">{subCat.sub_category}</ListGroup.Item>
                                })
                            }
                        </ListGroup>
                    </td>
                    <td><div onClick={()=>handleImageModalShow(category.image_path)} style={{width:"80px", height: "84px", overflow: "hidden", border: "1px solid #eff1f2", borderRadius: "3px", backgroundColor: "white"}}><img src={ "/storage/"+category.image_path } alt={ "noimage.jpg" } width="100%"/></div></td>
                    <td>{ new Date(category.created_at).toISOString().substring(0, 10) }</td>
                    <td><b className="edit-button" onClick={()=>handleCatModalShow(category)}>Edit</b></td>
                  </tr>               
                })
            }
        </tbody>
    </table>
    <EditSubCategoryModal show={showSubsModal} handleClose={handleSubsModalClose} subCatName={selectedSub?.sub_category} subCatId={selectedSub?.id}/>
    <EditCategoryModal show={showCatModal} handleClose={handleCatModalClose} catName={selectedCat?.category_name} catId={selectedCat?.id} imagePath={selectedCat?.image_path} addSubsButtonClick={addSubsButtonClick} />
    <AddSubCategoriesFormModal addExtraSub={addExtraSub} handleClose={handleAddSubsModalClose} show={showAddSubsModal} addSubCategory={addSubCategories} subCategories={subCategories} setSubCategories={setSubCategories} />
    <ViewImageModal show={showImageModal} handleClose={handleImageModalClose} image={selectedImage} />
</div>
}

if(document.getElementById('categories_div')){
    createRoot(document.getElementById('categories_div')!).render(<Categories />)
}