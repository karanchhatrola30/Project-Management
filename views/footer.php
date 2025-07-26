    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('tbody tr').forEach((row, index) => {
                row.style.animationDelay = `${index * 0.1}s`;
            });

            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('mouseenter', () => {
                    button.style.transform = 'translateY(-2px)';
                    button.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.15)';
                });
                button.addEventListener('mouseleave', () => {
                    button.style.transform = 'translateY(0)';
                    button.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.1)';
                });
            });

            const searchInput = document.querySelector('input[name="search_term"]');
            if (searchInput && searchInput.value) {
                searchInput.focus();
            }

            const animateProgressBars = () => {
                const progressBars = document.querySelectorAll('.progress-fill');
                progressBars.forEach(bar => {
                    const width = bar.style.width;
                    bar.style.width = '0';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 100);
                });
            };

            setTimeout(animateProgressBars, 300);
        });

        function sortTable(columnIndex, section) {
            console.log(`Sorting ${section} table by column ${columnIndex}`);
        }
    </script>
</body>
</html>