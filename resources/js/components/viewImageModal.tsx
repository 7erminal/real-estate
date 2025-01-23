import React, { useState, useEffect } from "react";
import { Col, Form, Modal, Row } from "react-bootstrap";
// @ts-ignore
import Api from "../utils/apis/apis.js"
// @ts-ignore
import { ROUTES } from "../utils/apis/endpoints.js"

type Props = {
    show: boolean
    handleClose: ()=>void
    image: string | undefined
}

const ViewImageModal: React.FC<Props> = ({show, handleClose, image})=>{

    return <Modal show={show} onHide={handleClose} centered>
    <img src={ "/storage/"+image } alt={ "noimage.jpg" } />
  </Modal>
}

export default ViewImageModal