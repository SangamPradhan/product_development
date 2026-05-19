const selector = '#my-canvas'
const options = {}
const canvasElement = document.querySelector(selector)

let instance, canvas

// Basic instantiation
instance = new CanvasParticles(selector)
instance = new CanvasParticles(canvasElement)

// Instantiation with custom options
instance = new CanvasParticles(selector, options)
instance = new CanvasParticles(canvasElement, options)

new CanvasParticles('#showcase-interact', {
    mouse: {
        interactionType: 0,
        connectDistMult: 0.8,
        distRatio: 1,
    },
    particles: {
        maxWork: Infinity,
    },
}).start()