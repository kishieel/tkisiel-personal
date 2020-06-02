import React, { useState } from 'react'
import { Row, Col, Form, Button } from 'react-bootstrap'
import ContactResponse from './ContactResponse'

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
			(async () => {
				await fetch('https://tkisiel.pl/send/', {
					method: 'POST',
					headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
					},
					redirect: 'follow',
					body: JSON.stringify( payload ),
				}).then( ( res ) => ( res.json() ) )
				.then( ( res ) => {
					if ( res.status === "success" ) {
						setSignature("")
						setEmail("")
						setMessage("")
						setSended(true)
						setValidated(false)
					} else {
						setSended(false)
						setValidated(false)
					}
				}).catch( () => {
					setSended(false)
					setValidated(false)
				})

				setTimeout( () => setSended(null), 10000 )
			})()
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
				<ContactResponse success={ sended } />
				<Col xs={12} sm={6}>
					<Form.Control type="text" placeholder="Signature" value={ signature } onChange={ (e) => setSignature( e.target.value )} size="lg" required/>
					<Form.Control.Feedback type="invalid">
		            	Please provide your signature..
		          	</Form.Control.Feedback>
				</Col>
				<Col className="pt-3 py-sm-0" xs={12} sm={6}>
					<Form.Control type="email" placeholder="Your e-mail" value={ email } onChange={ (e) => setEmail( e.target.value )} size="lg" required/>
					<Form.Control.Feedback type="invalid">
		            	Please provide a valid email address.
		          	</Form.Control.Feedback>
				</Col>
				<Col className="pt-3" xs={12}>
					<Form.Control as="textarea" style={{ minHeight: 120 }} placeholder="How can I help you?" value={ message } onChange={ (e) => setMessage( e.target.value )} size="lg" required/>
					<Form.Control.Feedback type="invalid">
		            	Please provide what you expected from me.
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
