const scrollToUp = () => {

    const scrollToUpButton = document.querySelector('#scrollUp')

    window.onscroll = () => {
        let scrollTop = window.scrollY;
        let docHeight = document.body.offsetHeight;
        let winHeight = window.innerHeight;
        let scrollPercent = scrollTop / (docHeight - winHeight);
        let scrollPercentRounded = Math.round(scrollPercent * 100);
        let degrees = scrollPercent * 360;

        scrollToUpButton.style.display = document.body.scrollTop > 80 || document.documentElement.scrollTop > 80 ? "block" : "none";

        document.querySelector("#scrollUp .scrollUp__background").style.background = `conic-gradient(#ff8811 ${degrees}deg, #ffe7cf ${degrees}deg)`;
    }

}

export default scrollToUp