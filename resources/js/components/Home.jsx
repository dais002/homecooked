import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";

// big workaround....
// dispatched stores state to component
// convert state from object to array to filter state values
// dispatch store key to redux to enter store
// state management to be refactored
const Home = ({ stores, selectStore }) => {
  const [displayStores, setDisplayStores] = useState([]);

  useEffect(() => {
    setDisplayStores(Object.entries(stores));
  }, [stores]);

  const searchResult = (event) => {
    event.preventDefault();
    const searchText = event.target.value;
    const storesData = Object.entries(stores);

    const searchFilter = storesData.filter((store) => {
      let searchValues = [];

      // recursive function to grab all details to add to searchValues array
      // very specific to state, refactor/review needed
      const getSearchValues = (stores) => {
        for (let key in stores) {
          if (key === "logo" || key === "photo") continue;
          if (Array.isArray(stores[key])) {
            searchValues.push(...stores[key]);
          } else if (typeof stores[key] === "object") {
            getSearchValues(stores[key]);
          } else if (typeof stores[key] === "number") {
            continue;
          } else {
            searchValues.push(stores[key]);
          }
        }
        return searchValues;
      };

      const searchString = getSearchValues(store[1]).join(" ");

      // needs major refactoring - workaround to grab keys
      if (searchString.includes(searchText)) return store;
    });
    setDisplayStores(searchFilter);
  };

  const renderStores = displayStores.map((store, idx) => {
    return (
      <button onClick={() => selectStore(store[0])} key={idx}>
        <Link to={`/store/${store[0]}`} className="store-cards">
          <img src={store[1].logo} alt="name" />
          <div className="store-text">
            <h2>{store[1].vendor}</h2>
            <h4>{store[1].cuisine}</h4>
          </div>
        </Link>
      </button>
    );
  });

  return (
    <div className="home-container">
      <div className="break-container">
        <div className="search-bar">
          <span>Search for your favorite foods</span>
          <input
            className="search-bar-input"
            type="text"
            placeholder="ie. dessert, churros, cheesecake..."
            onChange={searchResult}
          />
        </div>
      </div>
      <div className="stores-container">{renderStores}</div>
      <div className="footer-space"></div>
    </div>
  );
};

export default Home;
