import React, { useState } from 'react'
import { Col } from 'react-bootstrap'

const ContactResponse = ( props ) => {
	const { success } = props

	if ( success === true ) {
		return (<>
			<Col xs={12}>
				<div class="alert alert-success" role="alert">
					Successfully sended message. Please wait for my replay&nbsp;:)
				</div>
			</Col>
		</>)
	} else if ( success == false ) {
		return (<>
			<Col xs={12}>
				<div class="alert alert-success" role="alert">
					Unfortunately something went wrong. Please try to contact with my by my social media.
				</div>
			</Col>
		</>)
	}

	return null
}

export default ContactResponse
