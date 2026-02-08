// /*
//  * Script to disable developer tools, common actions, and customize text selection color.
//  */

// // Disable right-click context menu
// document.addEventListener('contextmenu', event => event.preventDefault());

// // Disable keyboard shortcuts for developer tools and common actions
// document.addEventListener('keydown', event => {
//     // F12 key (Chrome, Firefox, Edge)
//     if (event.key === 'F12') {
//         event.preventDefault();
//     }
//     // Ctrl+Shift+I (Chrome, Edge), Cmd+Opt+I (Mac)
//     if (event.ctrlKey && event.shiftKey && event.key === 'I' || event.metaKey && event.altKey && event.key === 'I') {
//         event.preventDefault();
//     }
//     // Ctrl+Shift+J (Chrome, Edge), Cmd+Opt+J (Mac)
//     if (event.ctrlKey && event.shiftKey && event.key === 'J' || event.metaKey && event.altKey && event.key === 'J') {
//         event.preventDefault();
//     }
//     // Ctrl+Shift+C (Chrome, Edge), Cmd+Opt+C (Mac)
//     if (event.ctrlKey && event.shiftKey && event.key === 'C' || event.metaKey && event.altKey && event.key === 'C') {
//         event.preventDefault();
//     }
//     // Ctrl+U (View Source)
//     if (event.ctrlKey && event.key === 'u' || event.metaKey && event.key === 'u') {
//         event.preventDefault();
//     }
//     // Ctrl+A (Select All) and Ctrl+C (Copy)
//     if (event.ctrlKey && (event.key === 'a' || event.key === 'c') || event.metaKey && (event.key === 'a' || event.key === 'c')) {
//         event.preventDefault();
//     }
//     // Add Ctrl+P (Print)
//     if (event.ctrlKey && event.key === 'p' || event.metaKey && event.key === 'p') {
//         event.preventDefault();
//     }
// });

// Change text selection color using CSS
const style = document.createElement('style');
style.innerHTML = `
    ::selection {
        background: #04D9FF; /* Change background color */
        color: #000000;      /* Change text color */
    }
    ::-moz-selection {
        background: #04D9FF;
        color: #000000;
    }
`;
document.head.appendChild(style);