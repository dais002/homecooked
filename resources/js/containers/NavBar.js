import React from "react";
import { Link } from "react-router-dom";
import { connect } from "react-redux";
import { resetInStore } from "../actions/resetInStore";

const NavBar = ({ cart, resetInStore }) => {
  return (
    <header>
      <nav className="navbar">
        <div className="logo">
          <Link className="logo-link" onClick={() => resetInStore()} to="/">
            getHomeCooked
          </Link>
        </div>
        <ul className="navright">
          <li>
            <Link className="navlinks about" to="/about">
              About
            </Link>
          </li>
          <li>
            <Link className="cart navlinks" to="/checkout">
              <ion-icon name="cart-outline"></ion-icon> Cart ({cart})
            </Link>
          </li>
        </ul>
      </nav>
    </header>
  );
};

const mapStateToProps = (state) => ({
  cart: state.homeReducer.cart,
});

export default connect(mapStateToProps, { resetInStore })(NavBar);
