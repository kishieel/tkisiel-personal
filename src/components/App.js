import React, { Component } from 'react';
import { Jumbotron, Nav, Button, Card, Form, Container, Row, Col } from 'react-bootstrap'
import profilePhoto from '../img/profile_photo_2.jpg'
import ezakrystiaLogo from '../img/ezakrystia_logo.png'
import carrotGardenLogo from '../img/carrot_garden_logo.png'
import lettersAndNumbersLogo from '../img/letters_and_numbers_logo.png'
import locallyLogo from '../img/locally_logo.png'
import carrotHRPhoto from '../img/carrot_hr_photo.png'
import { ReactComponent as GitIcon, gitIcon } from '../img/github-alt-brands.svg'
import { ReactComponent as LinkedInIcon } from '../img/linkedin-in-brands.svg'
import { ReactComponent as MailIcon } from '../img/envelope-solid.svg'

const ProjectCard = ( props ) => {
	const { title, children, link, img } = props

	return (<>
		<Card className="mt-3" >
			<a className="overflow-hidden p-3" href={ link } style={{ background: "#eee" }}>
				<Card.Img className="card-img-animation" variant="top" src={ img }/>
			</a>
			<Card.Body>
				<Card.Title>{ title }</Card.Title>
				<Card.Text>{ children }</Card.Text>
				<a className="d-block text-center" href={ link }>
					<Button className="px-3" variant="web-primary" style={{ color: "#fff" }}>CHECK IT</Button>
				</a>
			</Card.Body>
		</Card>
	</>)
}

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
			<Jumbotron>
				<h1>Tomasz Kisiel</h1>
				<div className="pt-2" style={{ fontSize: 26, fontWeight: 300 }}>Fullstack Web Developer</div>
				<p className="pt-2">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
				<Button className="px-3" variant="web-primary" style={{ color: "#fff" }}>CONTACT ME</Button>
			</Jumbotron>

			<Container fluid>
				<Row>
					<Col>
						<h1 className="article-heading">Knowledge</h1>
					</Col>
				</Row>
				<Row className="pt-3">
					<Col>
						<p className="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</Col>
				</Row>
				<Row>
					<Col xs={12} sm={6} lg={4}>
						<p className="pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col xs={12} sm={6} lg={4}>
						<p className="pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col xs={12} sm={6} lg={4}>
						<p className="pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col xs={12} sm={6} lg={4}>
						<p className="pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col xs={12} sm={6} lg={4}>
						<p className="pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col xs={12} sm={6} lg={4}>
						<p className="pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
				</Row>
				<Row className="pt-4">
					<Col>
						<h1 className="article-heading">Fetured projects</h1>
					</Col>
				</Row>
				<Row>
					<Col>
						<p className="pt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</Col>
				</Row>
				<Row className="justify-content-start ">
					<Col xs={12} sm={6} lg={4} xl={3}>
						<ProjectCard title="Locally [ WIP ]" img={ locallyLogo } link="https://github.com/evilghostgirl/locally-frontend-web">
							Locally are free classifieds in many categories of everyday life. You will quickly find what you need here. You want to buy something - here you will find interesting deals, cheaper than in the store.
						</ProjectCard>
					</Col>
					<Col xs={12} sm={6} lg={4} xl={3}>
						<ProjectCard title="CarrotHR" img={ carrotHRPhoto } link="http://carrot-hr.tkisiel.pl">
							An employee's intelligent working time planner, including the Polish working time system. Add new employees, customize to your needs your and create an optimized work plan.
						</ProjectCard>
					</Col>
					<Col className="d-block d-lg-none d-xl-block" xs={12} sm={6} lg={4} xl={3}>
						<ProjectCard title="Carrot Garden" img={ carrotGardenLogo } link="https://play.google.com/store/apps/details?id=pl.tkisiel.carrotgarden&gl=PL">
							Fascinating game about picking carrots.. can there be anything better? It guarantees an unforgettable experience.. entertains and teaches along with the carrots obtained.<br/><br/>
						</ProjectCard>
					</Col>
					<Col xs={12} sm={6} lg={4} xl={3}>
						<ProjectCard title="eZakrystia.pl" img={ ezakrystiaLogo } link="https://demo2.ezakrystia.pl">
								Veryfication system of the acolytes presence, includes a website for users and moderators, a mobile application and a mobile scanner based on Raspberry&nbsp;Pi.
						</ProjectCard>
					</Col>
					<Col xs={ 12 }>
						<h2 className="text-center pt-3" href="">
							<a href="https://github.com/TomaszKisiel" style={{ color: "#212529" }}>
								<GitIcon className="align-top mr-2" style={{ width: 36 }} fill="#212529"/>
								Find more on my GitHub profile!
							</a>
						</h2>
					</Col>
				</Row>
				<Row className="pt-4">
					<Col>
						<h1 className="article-heading">Contact me</h1>
					</Col>
				</Row>
				<Row className="py-3">
					<Col>
						<p className="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</Col>
				</Row>
			</Container>
		</main>
	</>)
}

// <Col xs={ "auto" } xs={12} sm={6} lg={4} xl={3}>
// 	<ProjectCard title="Letters and Numbers" img={ lettersAndNumbersLogo } link="https://play.google.com/store/apps/details?id=pl.tkisiel.literyicyfry&gl=PL">
// 		Letters and Numbers is a simple mobile game that diversifies the learning of alphabet characters, simple words and mathematical operations such as addition and subtraction on numbers.
// 	</ProjectCard>
// </Col>

class App extends Component {
	render() {
		return (<>
			<Sidebar />
			<Content />
		</>);
	}
}

export default App;
