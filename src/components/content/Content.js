import React, { Component } from 'react';
import { Nav, Button, Form, Container, Row, Col } from 'react-bootstrap'
import AboutMe from './AboutMe'
import Knowledge from './Knowledge'
import FeaturedProjects from './FeaturedProjects'
import ContactMe from './ContactMe'

const Content = () => {
	return (<>
		<main className="content">
			<AboutMe/>
			<Container fluid>
				<Knowledge/>
				<FeaturedProjects/>
				<ContactMe/>
			</Container>
		</main>
	</>)
}

export default Content
