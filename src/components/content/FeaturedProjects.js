import React from 'react'
import { Row, Col } from 'react-bootstrap'
import ProjectCard from './ProjectCard'
import ezakrystiaLogo from '../../img/ezakrystia_logo.png'
import carrotGardenLogo from '../../img/carrot_garden_logo.png'
import lettersAndNumbersLogo from '../../img/letters_and_numbers_logo.png'
import locallyLogo from '../../img/locally_logo.png'
import carrotHRPhoto from '../../img/carrot_hr_photo.png'
import { ReactComponent as GitIcon } from '../../img/github-alt-brands.svg'

const FeaturedProjects = ( props ) => {
	return (<>
		<Row className="pt-4">
			<Col>
				<h1 className="article-heading">Featured projects</h1>
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
	</>)
}

export default FeaturedProjects
