
const container = document.getElementById('particle-container');
const particles = [];

container.addEventListener('mousemove', (e) => {
const rect = container.getBoundingClientRect();
const x = e.clientX - rect.left;
const y = e.clientY - rect.top;
const speed = Math.sqrt(e.movementX * e.movementX + e.movementY * e.movementY);

const particle = document.createElement('div');
particle.classList.add('particle');
particle.style.left = `${x}px`;
particle.style.top = `${y}px`;

const direction = Math.random() * 2 * Math.PI;
const velocityX = Math.cos(direction) * speed;
const velocityY = Math.sin(direction) * speed;

container.appendChild(particle);
particles.push( {element: particle, velocityX, velocityY});

setTimeout(() => {
    particle.remove();
    particles.shift();
}, 10000);
});

function animateParticles() {
particles.forEach(p => {
    const rect = container.getBoundingClientRect();
    const particleRect = p.element.getBoundingClientRect();
    let x = parseFloat(p.element.style.left);
    let y = parseFloat(p.element.style.top);

    x += p.velocityX * 0.1;
    y += p.velocityY * 0.1;

    if (x <= 0 || x >= rect.width - particleRect.width) {
        p.velocityX *= -1;
    }
    if (y <= 0 || y >= rect.height - particleRect.height) {
        p.velocityY *= -1;
    }

    p.element.style.left = `${x}px`;
    p.element.style.top = `${y}px`;
})

requestAnimationFrame(animateParticles);
}

animateParticles(); // Iniciar animación, fin de función
