import React from 'react'
import { Row, Col } from 'react-bootstrap'
import { ReactComponent as CssIcon } from '../../img/css3-alt-brands.svg'
import { ReactComponent as HtmlIcon } from '../../img/html5-brands.svg'
import { ReactComponent as JavaIcon } from '../../img/java-brands.svg'
import { ReactComponent as JSIcon } from '../../img/js-square-brands.svg'
import { ReactComponent as NodeIcon } from '../../img/node-js-brands.svg'
import { ReactComponent as PhpIcon } from '../../img/php-brands.svg'
import { ReactComponent as ReactIcon } from '../../img/react-brands.svg'
import { ReactComponent as SassIcon } from '../../img/sass-brands.svg'
import { ReactComponent as LaravelIcon } from '../../img/laravel-brands.svg'
import { ReactComponent as PythonIcon } from '../../img/python-brands.svg'
import { ReactComponent as DBIcon } from '../../img/database-solid.svg'
import { ReactComponent as NpmIcon } from '../../img/npm-brands.svg'

const Knowledge = ( props ) => {
	return (<>
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
				<p className="m-0">Using the latest HTML5 capabilities like semantic tags, WebForms or Audio & Video as well as new properties or CSS layouts like grid or flexbox allow me to create reliable pages tailored to every situation.</p>
			</Col>
			<Col className="pt-3" xs={12} sm={6} lg={4}>
				<p className="mb-2" style={{ height: 32 }}>
					<SassIcon style={{ height: "100%", color: "#cc6699" }}/>
				</p>
				<h6 className="mb-2">Sass & Bootstrap & UIkit</h6>
				<p className="m-0">To increase the comfort of my work and maximally speed up the process, I use the SASS preprocessor and CSS framworks like Bootstrap or UIkit so that I can shape projects according to my own vision.</p>
			</Col>
			<Col className="pt-3" xs={12} sm={6} lg={4}>
				<p className="mb-2" style={{ height: 32 }}>
					<JSIcon className="pr-2" style={{ height: "100%", color: "#F1DE4F" }}/>
					<NodeIcon className="pr-2" style={{ height: "100%", color: "#54B689" }}/>
					<NpmIcon style={{ height: "100%", color: "#cb3837" }}/>
				</p>
				<h6 className="mb-2">JS & Node</h6>
				<p className="m-0">To create user-friendly and intuitive applications, I use the Node environment and numerous libraries it provides. However, when the need arises I am not afraid to create something new using VanilaJS.</p>
			</Col>
			<Col className="pt-3" xs={12} sm={6} lg={4}>
				<p className="mb-2" style={{ height: 32 }}>
					<ReactIcon style={{ height: "100%", color: "#62D4FA" }}/>
				</p>
				<h6 className="mb-2">React & React Native</h6>
				<p className="m-0">
					The main library that I use to create my applications is React with Redux, which allows me to conveniently and easily create ordered and easy-to-maintain applications with the possibility of continuous development..</p>
			</Col>
			<Col className="pt-3" xs={12} sm={6} lg={4}>
				<p className="mb-2" style={{ height: 32 }}>
					<PhpIcon className="pr-2" style={{ height: "100%", color: "#474A8A"}}/>
					<LaravelIcon style={{ width: 24, color: "#ec4e43" }}/>
				</p>
				<h6 className="mb-2">PHP & Laravel</h6>
				<p className="m-0">Using PHP and the Laravel framework, I can easily create a application backend side, which communicate with databases, and share resources with my external applications using the REST API.</p>
			</Col>
			<Col className="pt-3" xs={12} sm={6} lg={4}>
				<p className="mb-2" style={{ height: 32 }}>
					<JavaIcon className="pr-2" style={{ height: "100%", color: "crimson" }}/>
					<PythonIcon className="pr-2" style={{ height: "100%", color: "#456E9C" }}/>
					<DBIcon style={{ width: 24, color: "darkgray" }}/>
				</p>
				<h6 className="mb-2">Other</h6>
				<p className="m-0">Although my main interest is creating interactive applications that make the user more enjoyable while using the Internet, I learned the basics of many other languages ​​and technologies such as Java, Kotlin, Python, C, C ++, C # and MySQL.</p>
			</Col>
		</Row>
	</>)
}

export default Knowledge
