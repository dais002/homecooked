import React from "react";
import ReactDOM from "react-dom";
// import AppRouter from "./appRouter";
import storeConfig from "./store";
import "../sass/app.scss";
// import { Provider } from "react-redux";
// import { BrowserRouter } from "react-router-dom";
// import ScrollToTop from "./utils/ScrollToTop";

const store = storeConfig();

ReactDOM.render(
    <h1 className="text-green-500 text-xl">Hello</h1>,
    //     <Provider store={store}>
    //         <BrowserRouter>
    //             <ScrollToTop />
    //             <AppRouter />
    //         </BrowserRouter>
    //     </Provider>
    document.getElementById("root")
);
