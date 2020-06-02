import React from 'react';

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

export default SocialCircle
