import React from 'react';
import { Button, Card } from 'react-bootstrap'

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

export default ProjectCard
