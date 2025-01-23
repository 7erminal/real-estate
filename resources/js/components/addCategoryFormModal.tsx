import React, { Dispatch, RefObject, SetStateAction } from "react";
import { Form, Modal } from "react-bootstrap";

type Props = {
    show: boolean
    handleClose: ()=>void
    catName: string
    setCatName: Dispatch<SetStateAction<string>>
    addCategory: ()=>void
    hasSubs: boolean
    setHasSubs: Dispatch<SetStateAction<boolean>>
    setCatImage: Dispatch<SetStateAction<File | null | undefined>>
    fileRef: RefObject<HTMLInputElement>
}

const AddCategoryFormModal: React.FC<Props> = ({show, handleClose, catName, setCatName, addCategory, hasSubs, setHasSubs, setCatImage, fileRef})=>{
    const postCategory=(e: React.FormEvent<HTMLFormElement>)=>{
        e.preventDefault()

        addCategory()
    }
    
    return <Modal show={show} onHide={handleClose} centered>
    <Modal.Header closeButton>
      <Modal.Title>Category Name</Modal.Title>
    </Modal.Header>
    <Modal.Body>
        <Form onSubmit={(e)=>postCategory(e)}>
            <div className="form-group col">
                <div><label htmlFor="text-input" className=" form-control-label">Add Category</label></div>
                <div>
                    <input type="text" id="text-input" value={catName} onChange={(e)=>setCatName(e.target.value)} name="categoryName" placeholder="Enter Category Name" className="form-control form-control-sm" required/>
                    <input type="file" ref={fileRef} onChange={(e: React.ChangeEvent<HTMLInputElement>)=>setCatImage(e.target.files![0])} name="categoryImage" className="mt-3" required />
                </div>
            </div>
            <small className="form-text text-muted mt-2">Does this category have sub categories?</small>
            <Form.Check // prettier-ignore
                type="switch"
                checked={hasSubs}
                onChange={(e)=>setHasSubs(e.target.checked)}
                id="custom-switch"
                label="This Category has sub categories"
            />
            <button type="submit" className="btn btn-primary btn-sm my-4">
                <i className="fa fa-dot-circle-o"></i> Submit
            </button>
        </Form>
    </Modal.Body>
  </Modal>
}

export default AddCategoryFormModal