import React, { useState, useEffect } from "react";

const Ticker = () => {
  const message = "Thank you for supporting your local home chefs!          ";
  const [intro, setIntro] = useState({ character: "", count: 0, limit: 5 });
  const { character, count, limit } = intro;

  const tickIntro = () => {
    let newIntro;
    if (!message[count] && limit === 1) {
      newIntro = { ...intro, character: message, count: 0, limit: limit - 1 };
    } else if (!message[count]) {
      newIntro = { ...intro, character: "", count: 0, limit: limit - 1 };
    } else {
      newIntro = {
        ...intro,
        character: character + message[count],
        count: count + 1,
      };
    }
    setIntro(newIntro);
  };

  useEffect(() => {
    const timer = setInterval(() => {
      if (limit === 0) {
        clearInterval(timer);
      } else {
        tickIntro();
      }
    }, 100);
    return () => clearInterval(timer);
  }, [intro]);

  return <h3 className="ticker">{character}</h3>;
};

export default Ticker;
