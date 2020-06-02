import React from 'react';
import SocialCircle from './SocialCircle'
import profilePhoto from '../../img/profile_photo_2.jpg'
import { ReactComponent as GitIcon } from '../../img/github-alt-brands.svg'
import { ReactComponent as LinkedInIcon } from '../../img/linkedin-in-brands.svg'
import { ReactComponent as MailIcon } from '../../img/envelope-solid.svg'
import { ReactComponent as CarrotIcon } from '../../img/carrot-solid.svg'

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
					<a href="https://tkisiel.pl/v1.0">
						<CarrotIcon className="px-2 carrot-brand"  style={{ height: 32, color: "white" }}/>
					</a>
					<a href="https://tkisiel.pl/v1.0/_OLD2">
						<CarrotIcon className="px-2 carrot-brand"  style={{ height: 32, color: "white" }}/>
					</a>
				</div>
			</div>
		</nav>
	</>)
}

export default Sidebar
