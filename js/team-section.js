/**
 * Gretex Financial - Team Section
 * Handles team member display and interactions
 */

// Team Data
const teamData = {
    boardOfDirectors: [
        {
            name: 'Arvind Harlalka',
            role: 'Chairman & Managing Director',
            avatar: '../images/arvind-harlalka.jpg',
            bio: 'Leading Gretex with over 25 years of experience in financial services.',
            linkedin: '#',
            email: 'mailto:arvind@gretex.com'
        },
        {
            name: 'Alok Harlalkar',
            role: 'Whole Time Director',
            avatar: '../images/alok-harlalkar.jpg',
            bio: 'Expert in strategic planning and business development.',
            linkedin: '#',
            email: 'mailto:alok@gretex.com'
        }
    ],
    keyManagerialPersonnel: [
        {
            name: 'Rashmi Vyas',
            role: 'Chief Financial Officer',
            avatar: '../images/rashmi-vyas-min.png',
            bio: 'Overseeing financial operations and strategic planning.',
            linkedin: '#',
            email: 'mailto:rashmi@gretex.com'
        },
        {
            name: 'Rajeev Kanotra',
            role: 'Company Secretary & Compliance Officer',
            avatar: '../images/Rajeev Kanotra.png',
            bio: 'Ensuring regulatory compliance and corporate governance.',
            linkedin: '#',
            email: 'mailto:rajeev@gretex.com'
        }
    ],
    seniorManagement: [
        {
            name: 'Harikrishna',
            role: 'Head of Operations',
            avatar: '../images/harikrishana.jpeg',
            bio: 'Managing day-to-day operations and process optimization.',
            linkedin: '#',
            email: 'mailto:harikrishna@gretex.com'
        },
        {
            name: 'Khushbu Agarwal',
            role: 'Head of Client Relations',
            avatar: '../images/Khusbhu Agarwal.png',
            bio: 'Building and maintaining strong client relationships.',
            linkedin: '#',
            email: 'mailto:khushbu@gretex.com'
        },
        {
            name: 'Anjali Sapkal',
            role: 'Head of Compliance',
            avatar: '../images/Anjali Sapkal.jpg',
            bio: 'Ensuring adherence to regulatory standards.',
            linkedin: '#',
            email: 'mailto:anjali@gretex.com'
        },
        {
            name: 'Abhinav Chauhan',
            role: 'Head of Technology',
            avatar: '../images/Abhinav Chauhan.jpg',
            bio: 'Leading technology initiatives and digital transformation.',
            linkedin: '#',
            email: 'mailto:abhinav@gretex.com'
        }
    ]
};

// Generate Team Section HTML
function generateTeamSection() {
    const teamContainer = document.getElementById('team-section-container');
    if (!teamContainer) return;

    const html = `
        <section class="team-section">
            <div class="team-container">
                <div class="team-header">
                    <h2>Our Leadership Team</h2>
                    <p>Meet the experienced professionals driving Gretex Financial's success and innovation in the Indian equity market.</p>
                </div>

                <!-- Board of Directors -->
                <div class="team-category">
                    <div class="team-category-header">
                        <h3 class="team-category-title">Board of Directors</h3>
                        <span class="team-category-count">${teamData.boardOfDirectors.length}</span>
                    </div>
                    <div class="team-grid">
                        ${generateTeamMembers(teamData.boardOfDirectors, 'executive')}
                    </div>
                </div>

                <!-- Key Managerial Personnel -->
                <div class="team-category">
                    <div class="team-category-header">
                        <h3 class="team-category-title">Key Managerial Personnel</h3>
                        <span class="team-category-count">${teamData.keyManagerialPersonnel.length}</span>
                    </div>
                    <div class="team-grid">
                        ${generateTeamMembers(teamData.keyManagerialPersonnel, 'executive')}
                    </div>
                </div>

                <!-- Senior Management -->
                <div class="team-category">
                    <div class="team-category-header">
                        <h3 class="team-category-title">Senior Management</h3>
                        <span class="team-category-count">${teamData.seniorManagement.length}</span>
                    </div>
                    <div class="team-grid">
                        ${generateTeamMembers(teamData.seniorManagement, 'senior')}
                    </div>
                </div>
            </div>
        </section>
    `;

    teamContainer.innerHTML = html;

    // Initialize Lucide icons if available
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
}

// Generate Team Member Cards
function generateTeamMembers(members, badgeType) {
    return members.map(member => `
        <div class="team-member">
            <span class="team-member-badge ${badgeType}">${badgeType === 'executive' ? 'Executive' : 'Senior Management'}</span>
            <div class="team-member-avatar">
                <img src="${member.avatar}" alt="${member.name}" onerror="this.src='https://ui-avatars.com/api/?name=${encodeURIComponent(member.name)}&background=1873E0&color=fff&size=200'">
            </div>
            <h4 class="team-member-name">${member.name}</h4>
            <p class="team-member-role">${member.role}</p>
            <p class="team-member-bio">${member.bio}</p>
            <div class="team-member-social">
                ${member.linkedin ? `
                    <a href="${member.linkedin}" class="social-link" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                        <i data-lucide="linkedin"></i>
                    </a>
                ` : ''}
                ${member.email ? `
                    <a href="${member.email}" class="social-link" aria-label="Email">
                        <i data-lucide="mail"></i>
                    </a>
                ` : ''}
            </div>
        </div>
    `).join('');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    generateTeamSection();
});

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { teamData, generateTeamSection };
}
