import React, { useState } from 'react';

export function ReactThing({ test }) {

    // Add a counter to the component
    const [count, setCount] = useState(0);

    return (
        <div>
            <p onClick={() => setCount(count + 1)}>React Thing: {test}</p>
            <p>Count: {count}</p>
        </div>
    );
}

export function AnotherReactThing({ says }) {
    return (
        <div>
            <p>Another React Thing says: {says}</p>
        </div>
    );
}
