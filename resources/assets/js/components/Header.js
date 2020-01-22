import React from 'react'

class Header extends React.Component {
  render() {
    return (
      <div className="main-view-header row">
        <h3>Document #{this.props.fileindex}</h3>
      </div>
    )
  }
}

export default Header
