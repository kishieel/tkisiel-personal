import React, { Component } from 'react';
import { OverlayTrigger, Tooltip, Jumbotron, Nav, Button, Card, Form, Container, Row, Col } from 'react-bootstrap'
import profilePhoto from '../img/profile_photo_2.jpg'
import ezakrystiaLogo from '../img/ezakrystia_logo.png'
import carrotGardenLogo from '../img/carrot_garden_logo.png'
import lettersAndNumbersLogo from '../img/letters_and_numbers_logo.png'
import locallyLogo from '../img/locally_logo.png'
import carrotHRPhoto from '../img/carrot_hr_photo.png'
import { ReactComponent as GitIcon, gitIcon } from '../img/github-alt-brands.svg'
import { ReactComponent as LinkedInIcon } from '../img/linkedin-in-brands.svg'
import { ReactComponent as MailIcon } from '../img/envelope-solid.svg'
import { ReactComponent as CssIcon } from '../img/css3-alt-brands.svg'
import { ReactComponent as HtmlIcon } from '../img/html5-brands.svg'
import { ReactComponent as JavaIcon } from '../img/java-brands.svg'
import { ReactComponent as JSIcon } from '../img/js-square-brands.svg'
import { ReactComponent as NodeIcon } from '../img/node-js-brands.svg'
import { ReactComponent as PhpIcon } from '../img/php-brands.svg'
import { ReactComponent as ReactIcon } from '../img/react-brands.svg'
import { ReactComponent as SassIcon } from '../img/sass-brands.svg'
import { ReactComponent as LaravelIcon } from '../img/laravel-brands.svg'
import { ReactComponent as PythonIcon } from '../img/python-brands.svg'
import { ReactComponent as DBIcon } from '../img/database-solid.svg'
import { ReactComponent as NpmIcon } from '../img/npm-brands.svg'
import { ReactComponent as CarrotIcon } from '../img/carrot-solid.svg'


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
			<div className="position-relative pb-md-5" style={{ height: "100%" }}>
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
				<div className="text-center d-none d-md-block" style={{ position: "absolute", bottom: 0, left: 0, right: 0 }}>
					<CarrotIcon className="px-2 carrot-brand"  style={{ height: 32, color: "white" }}/>
					<CarrotIcon className="px-2 carrot-brand"  style={{ height: 32, color: "white" }}/>
					<CarrotIcon className="px-2 carrot-brand"  style={{ height: 32, color: "white" }}/>
				</div>
			</div>
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
					I am a young self-taught programmer. I'm mainly intrested in frontend and interactive application that can simplify routine activities performed every day. I can create pages and applications presenting the required content and interacting with the user. I always try to optimize my code to make it as efficient as possible and meet the prevailing standards. I am still learning and currently I am looking for my first job in the profession.
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
						<p className="m-0">
							I developed my skills on my own and at the same time tried to make them suit the needs of potential employers and clients. I create applications using the latest technologies to ensure maximum comfort and satisfaction of people for whom it performs tasks. You can see the base list of my skills below.</p>
					</Col>
				</Row>
				<Row>
					<Col className="pt-3" xs={12} sm={6} lg={4}>
						<p className="mb-2" style={{ height: 32 }}>
							<HtmlIcon className="pr-2"  style={{ height: "100%", color: "#DE6E3C" }}/>
							<CssIcon style={{ height: "100%", color: "#53A7DC" }}/>
						</p>
						<h6 className="mb-2">HTML & CSS</h6>
						<p className="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col className="pt-3" xs={12} sm={6} lg={4}>
						<p className="mb-2" style={{ height: 32 }}>
							<SassIcon style={{ height: "100%", color: "#cc6699" }}/>
						</p>
						<h6 className="mb-2">Sass & Bootstrap</h6>
						<p className="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col className="pt-3" xs={12} sm={6} lg={4}>
						<p className="mb-2" style={{ height: 32 }}>
							<JSIcon className="pr-2" style={{ height: "100%", color: "#F1DE4F" }}/>
							<NodeIcon className="pr-2" style={{ height: "100%", color: "#54B689" }}/>
							<NpmIcon style={{ height: "100%", color: "#cb3837" }}/>
						</p>
						<h6 className="mb-2">JS & Node</h6>
						<p className="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col className="pt-3" xs={12} sm={6} lg={4}>
						<p className="mb-2" style={{ height: 32 }}>
							<ReactIcon style={{ height: "100%", color: "#62D4FA" }}/>
						</p>
						<h6 className="mb-2">React & React Native</h6>
						<p className="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col className="pt-3" xs={12} sm={6} lg={4}>
						<p className="mb-2" style={{ height: 32 }}>
							<PhpIcon className="pr-2" style={{ height: "100%", color: "#474A8A"}}/>
							<LaravelIcon style={{ width: 24, color: "#ec4e43" }}/>
						</p>
						<h6 className="mb-2">PHP & Laravel</h6>
						<p className="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
					<Col className="pt-3" xs={12} sm={6} lg={4}>
						<p className="mb-2" style={{ height: 32 }}>
							<JavaIcon className="pr-2" style={{ height: "100%", color: "crimson" }}/>
							<PythonIcon className="pr-2" style={{ height: "100%", color: "#456E9C" }}/>
							<DBIcon style={{ width: 24, color: "darkgray" }}/>
						</p>
						<h6 className="mb-2">Other</h6>
						<p className="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</Col>
				</Row>
				<Row className="pt-4">
					<Col>
						<h1 className="article-heading">Fetured projects</h1>
					</Col>
				</Row>
				<Row>
					<Col>
						<p className="pt-4">
							I always try to make my projects make life easier for the target group or to be a form of entertainment or education for others. I like to share my knowledge and create small and large projects with other people from whom I can learn. I am not afraid of new challenges and I always try to create something interesting. You can see my biggest projects below to see more of my work check my profile on GitHub.
						</p>
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
						<p className="m-0">
							If you are interested in collaboration with me or would like to ask something, you can use the form below, thanks to which your message will reach me as soon as possible.
						</p>
					</Col>
				</Row>
				<Row className="py-3">
					<Col xs={12} sm={6}>
						<Form.Control type="text" placeholder="Signature" />
					</Col>
					<Col className="pt-4 py-sm-0" xs={12} sm={6}>
						<Form.Control type="text" placeholder="Your e-mail" />
					</Col>
					<Col className="pt-4" xs={12}>
						<Form.Control as="textarea" style={{ minHeight: 120 }} placeholder="How can I help you?" />
					</Col>
					<Col className="text-center pt-4">
						<Button variant="web-primary" style={{ color: "white" }}>SEND NOW</Button>
					</Col>
				</Row>
				<Row>
					<Col className="py-4"></Col>
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
