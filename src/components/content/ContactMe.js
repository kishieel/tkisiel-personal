import React, { useState } from 'react'
import { Row, Col, Form, Button } from 'react-bootstrap'

const ContactMe = ( props ) => {
	const [ validated, setValidated ] = useState(false);
	const [ signature, setSignature ] = useState("")
	const [ email, setEmail ] = useState("")
	const [ message, setMessage ] = useState("")
	const [ sended, setSended ] = useState( null )

	const handleSubmit = (e) => {
		e.preventDefault()
		e.stopPropagation()

		const payload = { signature, email, message }
		const form = e.currentTarget
		if ( form.checkValidity() === true ) {
			fetch('https://tkisiel.pl/send', {
				method: "POST",
				body: JSON.stringify( payload ),
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				},
			}).then( ( res ) => ( res.json() ) )
			.then( ( res ) => {
				if ( res.status === "success" ) {
					setSignature("")
					setEmail("")
					setMessage("")
					setSended(true)
					setValidated(false)
				}
			}).catch( () => {
				setSended(false)
				setValidated(false)
			})
		}

		setValidated(true)
	};

	return (<>
		<Row id="contact" className="pt-4">
			<Col>
				<h1 className="article-heading">Contact me</h1>
			</Col>
		</Row>
		<Row className="py-3">
			<Col>
				<p className="m-0">
					If you are interested in collaboration with me or would like to ask something, you can use the form below, thanks to which your message will reach me as soon as possible.
				</p>
			</Col>
		</Row>
		<Form validated={ validated } onSubmit={ handleSubmit } noValidate>
			<Row className="py-3">
				<Col xs={12} sm={6}>
					<Form.Control type="text" placeholder="Signature" value={ signature } onChange={ (e) => setSignature( e.target.value )} size="lg" required/>
					<Form.Control.Feedback type="invalid">
		            	Please provide your signature..
		          	</Form.Control.Feedback>
				</Col>
				<Col className="pt-4 py-sm-0" xs={12} sm={6}>
					<Form.Control type="email" placeholder="Your e-mail" value={ email } onChange={ (e) => setEmail( e.target.value )} size="lg" required/>
					<Form.Control.Feedback type="invalid">
		            	Please provide a valid email address.
		          	</Form.Control.Feedback>
				</Col>
				<Col className="pt-4" xs={12}>
					<Form.Control as="textarea" style={{ minHeight: 120 }} placeholder="How can I help you?" value={ message } onChange={ (e) => setMessage( e.target.value )} size="lg" required/>
					<Form.Control.Feedback type="invalid">
		            	Please provide what you expected from me.
		          	</Form.Control.Feedback>
				</Col>
				<Col xs={12}>
					<Form.Control.Feedback className={ sended === null ? "d-none text-center" : "d-block text-center" } type={ sended === true ? "valid" : "invalid" }>
						<b>{ sended === true ? "Successfully sended message. Please wait for my replay :)" : "Unfortunately something went wrong. Please try to contact with my by my social media." }</b>
					</Form.Control.Feedback>
				</Col>
				<Col className="text-center pt-4">
					<Button type="submit" variant="web-primary" style={{ color: "white" }} size="lg" >SEND NOW</Button>
				</Col>
			</Row>
		</Form>
		<Row>
			<Col className="py-4"></Col>
		</Row>
	</>)
}

export default ContactMe
