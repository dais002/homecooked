import React from "react";
import NavBar from "./containers/NavBar";
import { Route, Switch } from "react-router-dom";
import About from "./components/About";
import VendorContainer from "./containers/VendorContainer";
import HomeContainer from "./containers/HomeContainer";
import CartContainer from "./containers/CartContainer";
import Ticker from "./components/Ticker";

const AppRouter = () => {
    return (
        <div className="App">
            <Ticker />
            <NavBar />
            <Switch>
                <Route exact path="/">
                    <HomeContainer />
                </Route>
                <Route path="/about" component={About}></Route>
                <Route path="/checkout">
                    <CartContainer />
                </Route>
                <Route path="/store/:id">
                    <VendorContainer />
                </Route>
            </Switch>
        </div>
    );
};

export default AppRouter;
