import React, { Component } from 'react';
import { Jumbotron, Nav, Button, Card, Form, Container, Row, Col } from 'react-bootstrap'
import profilePhoto from '../img/profile_photo_2.jpg'
import { ReactComponent as GitIcon } from '../img/github-alt-brands.svg'
import { ReactComponent as LinkedInIcon } from '../img/linkedin-in-brands.svg'
import { ReactComponent as MailIcon } from '../img/envelope-solid.svg'

const SocialCircle = ( props ) => {
	const { link, svg } = props

	return (
		<div className="social-circle mx-2" >
			<a href={ link }>
				{ svg }
			</a>
		</div>
	)
}

const Sidebar = () => {
	return (<>
		<nav className="sidebar p-3">
			<h4 className="pt-4">Tomasz Kisiel</h4>
			<img className="profile-photo pt-3" src={ profilePhoto } alt="profile photo" />
			<p className="font-weight-light pt-3">Hi! My name is Tomasz Kisiel. I'm fullstack web develper. Welcome to my personal web page.</p>
			<div className="align-middle">
				<SocialCircle link="https://github.com/TomaszKisiel" svg={
					<GitIcon className="align-top" fill="#eb9543"/>
				}/>
				<SocialCircle link="https://www.linkedin.com/in/tomasz-kisiel/" svg={
					<LinkedInIcon className="align-top" fill="#eb9543"/>
				}/>
				<SocialCircle link="mailto:tkisle5w4@yahoo.com" svg={
					<MailIcon className="align-top" fill="#eb9543"/>
				}/>
			</div>
			<hr/>
		</nav>
	</>)
}

const Content = () => {
	return (<>
		<main className="content">
			<Container fluid>
				<Row className="py-3">
					<Col md={ 5 } lg={ 3 }>
						<div class="sticky-top">
							<div class="nav flex-column">
								<a href="#_" class="nav-link">Link</a>
								<a href="#_" class="nav-link">Link</a>
								<a href="#_" class="nav-link">Link</a>
								<a href="#_" class="nav-link">Link</a>
								<a href="#_" class="nav-link">Link</a>
							</div>
						</div>
					</Col>
					<Col>
						<h1>Main Area</h1>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</Col>
				</Row>
				<Row>
					<Col>
						<Jumbotron>
							<h1>Tomasz Kisiel</h1>
							<div className="pt-2" style={{ fontSize: 26, fontWeight: 300 }}>Fullstack Web Developer</div>
							<p className="pt-2">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p>
						</Jumbotron>
					</Col>
				</Row>
			</Container>

			<Nav className="justify-content-end">
				<Nav.Item>
					<Nav.Link eventKey="about">About Me</Nav.Link>
				</Nav.Item>
				<Nav.Item>
					<Nav.Link eventKey="projects">Fetured projects</Nav.Link>
				</Nav.Item>
				<Nav.Item>
					<Nav.Link eventKey="contact">Contact</Nav.Link>
				</Nav.Item>
			</Nav>
			<Container fluid>
				<Row></Row>
				<Row>
					<Col className="px-0">

					</Col>
				</Row>
				<Row className="py-3">
					<Col md={ 3 } lg={ 2 }>
						<div class="sticky-top">
							<div class="nav flex-column">
								<a href="#_" class="nav-link">Link</a>
								<a href="#_" class="nav-link">Link</a>
								<a href="#_" class="nav-link">Link</a>
								<a href="#_" class="nav-link">Link</a>
								<a href="#_" class="nav-link">Link</a>
							</div>
						</div>
					</Col>
					<Col>
						<h1>Main Area</h1>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</Col>
				</Row>
				<Row className="justify-content-center ">
				<Col xs={ "auto" }>
					<Card style={{ width: '18rem' }}>
						<Card.Img variant="top" src={ profilePhoto } />
						<Card.Body>
							<Card.Title>Card Title</Card.Title>
							<Card.Text>
							Some quick example text to build on the card title and make up the bulk of
							the card's content.
							</Card.Text>
							<Button variant="primary">CHECK IT</Button>
						</Card.Body>
					</Card>
				</Col><Col xs={ "auto" }>
					<Card style={{ width: '18rem' }}>
						<Card.Img variant="top" src={ profilePhoto } />
						<Card.Body>
							<Card.Title>Card Title</Card.Title>
							<Card.Text>
							Some quick example text to build on the card title and make up the bulk of
							the card's content.
							</Card.Text>
							<Button variant="primary">CHECK IT</Button>
						</Card.Body>
					</Card>
				</Col><Col xs={ "auto" }>
					<Card style={{ width: '18rem' }}>
						<Card.Img variant="top" src={ profilePhoto } />
						<Card.Body>
							<Card.Title>Card Title</Card.Title>
							<Card.Text>
							Some quick example text to build on the card title and make up the bulk of
							the card's content.
							</Card.Text>
							<Button variant="primary">CHECK IT</Button>
						</Card.Body>
					</Card>
				</Col><Col xs={ "auto" }>
					<Card style={{ width: '18rem' }}>
						<Card.Img variant="top" src={ profilePhoto } />
						<Card.Body>
							<Card.Title>Card Title</Card.Title>
							<Card.Text>
							Some quick example text to build on the card title and make up the bulk of
							the card's content.
							</Card.Text>
							<Button variant="primary">CHECK IT</Button>
						</Card.Body>
					</Card>
				</Col><Col xs={ "auto" }>
					<Card style={{ width: '18rem' }}>
						<Card.Img variant="top" src={ profilePhoto } />
						<Card.Body>
							<Card.Title>Card Title</Card.Title>
							<Card.Text>
							Some quick example text to build on the card title and make up the bulk of
							the card's content.
							</Card.Text>
							<Button variant="primary">CHECK IT</Button>
						</Card.Body>
					</Card>
				</Col><Col xs={ "auto" }>
					<Card style={{ width: '18rem' }}>
						<Card.Img variant="top" src={ profilePhoto } />
						<Card.Body>
							<Card.Title>Card Title</Card.Title>
							<Card.Text>
							Some quick example text to build on the card title and make up the bulk of
							the card's content.
							</Card.Text>
							<Button variant="primary">CHECK IT</Button>
						</Card.Body>
					</Card>
				</Col>
				</Row>
			</Container>
		</main>
	</>)
}

class App extends Component {
	render() {
		return (<>
			<Sidebar />
			<Content />
		</>);
	}
}

// <div class="row">
//   <div class="col-3">
//     <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
//       <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
//       <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
//       <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
//       <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
//     </div>
//   </div>
//   <div class="col-9">
//     <div class="tab-content" id="v-pills-tabContent">
//       <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
//       <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
//       <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
//       <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
//     </div>
//   </div>
// </div>

export default App;
