let scrollPosition = 0
let viewHeight = 0
let onView = viewHeight

/**
 * @function init
 * Initialization function to retrieve user environment information
 */

const init = () => {
    viewHeight = window.innerHeight
    document.addEventListener('scroll', (event) => {
        scrollPosition = window.scrollY
    })
}

/**
 * @function scrollAnimate
 * Function to add the triggering of the animation on an element when the scroll is positioned correctly
 * @param {string} id Identifies by class name the elements to animate
 * @param {string} position Identifier of the initial position of the animation
 * @param {number} offset In pixels, the offset from the initial position of the animation
 * @param {string} [animation=on] CSS modifier class
 * **/

const scrollAnimate = (id, position, offset = 0, animation = 'on') => {
    const elements = document.getElementsByClassName(id)
    for (let index = 0; index < elements.length; index++) {
        const item = elements[index];
        const topViewport = item.getBoundingClientRect()
        let topElement = topViewport.y

        let start = null
        switch (position) {
            case 'bottom':
                start = topElement
                break;
            case 'middle':
                start = topElement + (viewHeight / 2)
                break;
            case 'top':
                start = topElement + viewHeight
                break;
        }

        if (offset !== 0) { start = start - offset }

        document.addEventListener('scroll', (event) => {
            scrollPosition = window.scrollY
            onView = scrollPosition + viewHeight
            if (onView >= start) item.classList.add(animation)
            if (onView < start) item.classList.remove(animation)
        })
    }
}