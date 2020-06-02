import React from 'react'
import { Jumbotron, Button } from 'react-bootstrap'

const AboutMe = ( props ) => {
	return (<>
		<Jumbotron>
			<h1>Tomasz Kisiel</h1>
			<div className="pt-2" style={{ fontSize: 26, fontWeight: 300 }}>Fullstack Web Developer</div>
			<p className="pt-2">
				I am a young self-taught programmer. I'm mainly intrested in frontend and interactive application that can simplify routine activities performed every day. I can create pages and applications presenting the required content and interacting with the user. I always try to optimize my code to make it as efficient as possible and meet the prevailing standards. I am still learning and currently I am looking for my first job in the profession.
			</p>
			<a href="#contact"><Button className="px-3" variant="web-primary" style={{ color: "#fff" }}>CONTACT ME</Button></a>
		</Jumbotron>
	</>)
}

export default AboutMe
