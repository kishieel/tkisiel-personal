import React, { Component } from 'react';
import Sidebar from './sidebar/Sidebar'
import Content from './content/Content'

class App extends Component {
	render() {
		return (<>
			<Sidebar />
			<Content />
		</>);
	}
}

export default App;
